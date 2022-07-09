<?php
namespace Pangu\Common\Traits;

use Closure;
use BadMethodCallException;
use InvalidArgumentException;
use Pangu\Common\Utility\Helpers;

/**
 * Add macros methods to an object class to handle callbacks on method __call
 *
 * @author Anthony Pauwels <hello@anthonypauwels.be>
 * @package Pangu\Common
 */
trait Macroable
{
    /** @var array */
    protected static $macros = [];

    /**
     * Add a macro to the object
     *
     * @param string $name
     * @param string $macro
     */
    public static function macro($name, $macro)
    {
        if ( !Helpers::isCallable( $macro ) ) {
            throw new InvalidArgumentException( sprintf('Second argument of method %s::%s must be a valid callback', __CLASS__, __METHOD__ ) );
        }

        static::$macros[ $name ] = $macro;

    }

    /**
     * If the object can handle the macro $name
     *
     * @param $name
     * @return bool
     */
    public static function hasMacro($name)
    {
        return isset( static::$macros[ $name ] );
    }

    /**
     * Override magic method __call to handle macro with given $name and $parameter
     *
     * @param string $method
     * @param array $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        if ( !static::hasMacro( $method ) ) {
            throw new BadMethodCallException( sprintf('Method %s does not exist', $method ) );
        }

        if ( static::$macros[ $method ] instanceof Closure ) {
            return call_user_func_array( static::$macros[ $method ]->bindTo( $this, __CLASS__ ), $parameters );
        }

        return call_user_func_array( static::$macros[ $method ], $parameters );
    }
}