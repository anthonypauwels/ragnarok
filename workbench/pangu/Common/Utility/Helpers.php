<?php
namespace Pangu\Common\Utility;

use Closure;
use ErrorException;

/**
 * Utility class for mixed operations
 *
 * @author Anthony Pauwels <hello@anthonypauwels.be>
 * @package Pangu\Common
 */
abstract class Helpers
{
    /**
     * This class cannot be instanced
     */
    private function __construct()
    {

    }

    /**
     * Callback argument can have many forms, PHP's " is_callable " does not recognize many of them like static method string or array
     * Argument callback can be called using call_user_func / call_user_func_array
     *
     * @param $callback
     * @return bool
     */
    public static function isCallable($callback):bool
    {
        /** the $callback can be a simple Closure function */
        if ( $callback instanceof Closure ) {
            return true;
        }

        /** the $callback is an object and can be used as a function with magic method __invoke */
        if ( is_object( $callback ) ) {
            return method_exists( $callback, '__invoke' );
        }

        /** the $callback is maybe an array so we need to check with ArrayUtil class if it's a conform array callback */
        if ( is_array( $callback ) ) {
            return Arr::isCallable( $callback );
        }

        if ( is_string( $callback ) ) {
            /** if we passed a simple function name like trim, array_map, etc. */
            if ( function_exists( $callback ) ) {
                return true;
            }

            /** the $callback can be a string like Class::Method used by static call */
            if ( Str::contains( '::', $callback ) ) {
                list( $class, $method ) = explode('::', $callback);

                return method_exists($class, $method);
            }

            /** same as before but for arrow notation like class->method */
            if ( Str::contains('->', $callback) ) {
                list( $class, $method ) = explode( '->', $callback );

                return method_exists($class, $method);
            }
        }

        /** using the PHP function as fallback */
        return is_callable( $callback );
    }

    /**
     * Calls a function and turns any PHP error into \ErrorException
     *
     * @param $function
     * @param array ...$args
     * @return mixed
     *
     * @throws ErrorException
     */
    public static function call($function, ...$args): mixed
    {
        if ( !static::isCallable( $function ) ) {
            throw new ErrorException( sprintf('First argument of %s::%s must be a callable, %s given instead', __CLASS__, __METHOD__, static::varToString( $function ) ) );
        }

        set_error_handler( function (int $type, string $message, string $file, int $line) {
            if ( $file === __FILE__ ) {
                $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 3 );
                $file = $trace[2]['file'] ?? $file;
                $line = $trace[2]['line'] ?? $line;
            }

            throw new ErrorException( $message, 0, $type, $file, $line );
        } );

        try {
            return call_user_func( $function, $args );
        } finally {
            restore_error_handler();
        }
    }

    /**
     * Returns a human-readable string for the specified variable type
     *
     * @param $variable
     * @return string
     */
    public static function varToString($variable): string
    {
        if ( is_object($variable) ) {
            return sprintf('object(%s)', get_class( $variable ) );
        }

        if ( is_array($variable) ) {
            $array = [];

            foreach ( $variable as $key => $value ) {
                $array[] = sprintf( '%s => %s', $key, self::varToString( $value ) );
            }

            return sprintf( 'array(%s)', implode(', ', $array) );
        }

        if ( is_resource( $variable ) ) {
            return sprintf( 'resource(%s)', get_resource_type( $variable ) );
        }

        if ( $variable === null ) {
            return 'null';
        }

        if ( $variable === false ) {
            return 'boolean value (false)';
        }

        if ( $variable === true ) {
            return 'boolean value (true)';
        }

        return '(string:' . strlen($variable) . ') ' . (string) $variable;
    }
}
