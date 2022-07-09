<?php
namespace Pangu\Common\Utility;

/**
 * Utility Class for array
 *
 * @author Anthony Pauwels <hello@anthonypauwels.be>
 * @package Pangu\Common
 */
abstract class Arr
{
    /**
     * This class cannot be instanced
     */
    private function __construct()
    {

    }

    /**
     * Get a value of a multidimensional array from dot-notated key
     *
     * @param array $array
     * @param string $find
     * @param mixed $default
     * @return mixed
     */
    public static function get(array $array, string $find, $default = null)
    {
        $split = explode( '.', $find );

        $value = $array;

        foreach ( $split as $key ) {
            if ( isset( $value[ $key ] ) ) {
                $value = $value[ $key ];
            } else {
                return $default;
            }
        }

        return $value;
    }

    /**
     * Set a value with dot-notated key into a multidimensional array
     *
     * @param $array
     * @param string $keys_path
     * @param $value
     * @return mixed
     */
    public static function set(&$array, string $keys_path, $value)
    {
        $split = explode('.', $keys_path);

        while ( count( $split ) > 1 ) {
            $key = array_shift($split);

            if ( !isset( $array[ $key ] ) || !is_array( $array[ $key ] ) ) {
                $array[$key] = [];
            }

            $array =& $array[ $key ];
        }

        $array[ array_shift( $split ) ] = $value;

        return $array;
    }

    /**
     * Check if a key exists with dot-nottated syntax into a multidimensional array
     *
     * @param $array
     * @param string $keys_path
     * @return bool
     */
    public static function has(&$array, string $keys_path)
    {
        $split = explode('.', $keys_path);

        while ( count( $split ) > 1 ) {
            $key = array_shift( $split );

            if ( !isset( $array[ $key ] ) ) {
                return false;
            }

            $array =& $array[ $key ];
        }

        return true;
    }

    /**
     * Determine if two arrays are identical
     *
     * @param array $array_a
     * @param array $array_b
     * @return bool
     */
    public static function areIdentical(array $array_a, array $array_b):bool
    {
        sort($array_a );
        sort($array_b );

        return $array_a === $array_b;
    }

    /**
     * Determine if an array is associative
     *
     * @param array $array
     * @return bool
     */
    public static function isAssoc(array $array):bool
    {
        if ( [] === $array ) {
            return false;
        }

        return !static::isIndexed( $array );
    }

    /**
     * Determine if an array is indexed
     *
     * @param array $array
     * @return bool
     */
    public static function isIndexed(array $array):bool
    {
        return array_keys( $array ) === range(0, count( $array ) - 1);
    }

    /**
     * If the given value is not an array and not null, wrap it in one
     *
     * @param $value
     * @return array
     */
    public static function wrap($value)
    {
        if ( is_null( $value ) ) {
            return [];
        }

        return is_array( $value ) ? $value : [ $value ];
    }

    /**
     * Divide an array into two arrays, one with keys and the second with values
     *
     * @param $array
     * @return array
     */
    public static function divide(array $array)
    {
        return [ array_keys( $array ), array_values( $array ) ];
    }

    /**
     * Flatten a multi-dimensional array into a single level array
     *
     * @param array $array
     * @return array
     */
    public static function flatten(array $array)
    {
        return array_merge( ...$array );
    }

    /**
     * Get a subset of the items from the given array
     *
     * @param  array  $array
     * @param  array|string  $keys
     * @return array
     */
    public static function only(array $array, $keys)
    {
        return array_intersect_key( $array, array_flip( static::wrap( $keys ) ) );
    }

    /**
     * Get all of the given array except for a specified array of keys
     *
     * @param  array  $array
     * @param  array|string  $keys
     * @return array
     */
    public static function except(array $array, $keys)
    {
        static::forget( $array, $keys );

        return $array;
    }

    /**
     * Remove one or many array items from a given array using "dot" notation.
     *
     * @param array $array
     * @param array|string $keys
     * @return null
     */
    public static function forget(array &$array, $keys)
    {
        $original = &$array;

        $keys = (array) $keys;

        if ( count( $keys ) === 0 ) {
            return;
        }

        foreach ( $keys as $key ) {
            if ( array_key_exists( $key, $array ) ) {
                unset( $array[ $key ] );

                continue;
            }

            $parts = explode( '.', $key );

            $array = &$original;

            while ( count( $parts ) > 1 ) {
                $part = array_shift( $parts );

                if ( isset( $array[ $part ] ) && is_array( $array[ $part ] ) ) {
                    $array = &$array[ $part ];
                } else {
                    continue 2;
                }
            }

            unset( $array[ array_shift( $parts ) ] );
        }
    }

    /**
     * Trim each value of an array
     *
     * @param array $array
     * @param string $char_list
     * @return array
     */
    public static function trim(array $array, string $char_list = ' '):array
    {
        return array_map( function ($v) use ($char_list) {
            return trim($v, $char_list);
        }, $array);
    }

    /**
     * Trim each value of an array
     *
     * @param array $array
     * @param string $char_list
     * @return array
     */
    public static function ltrim(array $array, string $char_list = ' '):array
    {
        return array_map( function ( $v ) use ( $char_list ) {
            return ltrim( $v, $char_list );
        }, $array);
    }

    /**
     * Trim each value of an array
     *
     * @param array $array
     * @param string $char_list
     * @return array
     */
    public static function rtrim(array $array, string $char_list = ' '):array
    {
        return array_map( function ( $v ) use ( $char_list ) {
            return rtrim( $v, $char_list );
        }, $array);
    }

    /**
     * Get the first item of an array
     *
     * @param array $array
     * @param null $callback
     * @param null $default
     * @return mixed
     */
    public static function first(array $array, $callback = null, $default = null)
    {
        if ( is_null( $callback ) ) {
            if ( empty( $array ) ) {
                return $default;
            }

            return array_shift($array);
        }

        foreach ( $array as $key => $value ) {
            if ( call_user_func( $callback, $value, $key ) ) {
                return $value;
            }
        }

        return $default;
    }

    /**
     * Get the last item of an array
     *
     * @param array $array
     * @param null $callback
     * @param null $default
     * @return mixed
     */
    public static function last(array $array, $callback = null, $default = null)
    {
        return static::first( array_reverse( $array ), $callback, $default );
    }

    /**
     * Filter the array using the given callback
     *
     * @param  array  $array
     * @param  callable  $callback
     * @return array
     */
    public static function where(array $array, $callback)
    {
        if ( !Helpers::isCallable( $callback ) ) {
            throw new \InvalidArgumentException( sprintf( 'Second argument of " %s::%s must be a valid callback, %s given', __CLASS__, __METHOD__, Helpers::varToString( $callback ) ), 200 );
        }

        return array_filter( $array, $callback, ARRAY_FILTER_USE_BOTH );
    }

    /**
     * Get the first key of an array
     *
     * @param array $array
     * @param null $callback
     * @param null $default
     * @return mixed
     */
    public static function keyFirst(array $array, $callback = null, $default = null)
    {
        return static::first( array_keys( $array ) , $callback, $default );
    }

    /**
     * Get the last key of an array
     *
     * @param array $array
     * @param null $callback
     * @param null $default
     * @return mixed
     */
    public static function keyLast(array $array, $callback = null, $default = null)
    {
        return static::last( array_keys( $array, $callback, $default ) );
    }

    /**
     * Convert the array into a http query string
     *
     * @param  array  $array
     * @return string
     */
    public static function query(array $array):string
    {
        return http_build_query( $array, null, '&', PHP_QUERY_RFC3986 );
    }

    /**
     * Pluck an array of values from an array
     *
     * @param array $array
     * @param string $key
     * @return array only with key data
     */
    public static function pluck(array $array, string $key):array
    {
        return array_map( function( $value ) use ( $key ) {
            return is_object( $value ) ? $value->$key : $value[ $key ];
        }, $array );
    }

    /**
     * Run a callback over each items of an array
     *
     * @param $array
     * @param $callback
     * @return array
     */
    public static function map($array, $callback):array
    {
        $keys = array_keys( $array );

        $data = array_map( $callback, $array, $keys );

        return array_combine( $keys, $data );
    }

    /**
     * Keys an array by the given key
     *
     * @param array $array
     * @param string $key
     * @return array
     */
    public static function keyBy(array $array, string $key):array
    {
        return array_combine( array_column( $array, $key ), array_values( $array ) );
    }

    /**
     * Remove one key from an associated array
     *
     * @param array $array
     * @param string $key
     * @return array
     */
    public static function removeKey(array $array, string $key):array
    {
        return array_map( function ( $item ) use ( $key ) {
            unset( $item[ $key ] );

            return $item;
        }, $array );
    }

    /**
     * Determine if array passed in argument is an array callback
     *
     * @param array $array
     * @return bool
     */
    public static function isCallable(array $array):bool
    {
        if ( isset( $array[0] ) && isset( $array[1] ) && count( $array ) === 2 ) {
            $class = is_object( $array[0] ) ? get_class( $array[0] ) : $array[0];

            return class_exists( $class ) && method_exists( $class, $array[1] );
        }

        return false;
    }
}
