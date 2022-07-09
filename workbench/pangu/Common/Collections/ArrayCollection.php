<?php
namespace Pangu\Common\Collections;

use ArrayAccess;
use ArrayIterator;
use Countable;
use IteratorAggregate;
use Pangu\Common\Utility\Arr;

/**
 * Representation of an Array that can be manipulated like an Object
 *
 * @author Anthony Pauwels <hello@anthonypauwels.be>
 * @package Pangu\Common
 */
class ArrayCollection implements IteratorAggregate, ArrayAccess, Countable
{
    /** @var array */
    protected $data = [];

    /**
     * ArrayCollection constructor.
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    /**
     * @return ArrayIterator
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator( $this->data );
    }

    /**
     * @param mixed $key
     * @return bool
     */
    public function offsetExists($key)
    {
        return $this->has( $key );
    }

    /**
     * @param mixed $key
     * @param mixed $value
     * @return mixed|void
     */
    public function offsetSet($key, $value)
    {
        $this->set($key, $value);
    }

    /**
     * @param mixed $key
     * @return mixed
     */
    public function offsetGet($key)
    {
        return $this->get( $key );
    }

    /**
     * @param mixed $key
     */
    public function offsetUnset($key)
    {
        $this->remove( $key );
    }

    /**
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        if ( isset( $this->data[ $key ] ) ) {
            return $this->data[ $key ];
        }

        return Arr::get( $this->data, $key, '' );
    }

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function set($key, $value)
    {
        if ( strpos( $key, '.' ) !== false ) {
            Arr::set( $this->data, $key, $value );
        } else {
            $this->data[ $key ] = $value;
        }

        return $value;
    }

    /**
     * @param $key
     * @return $this
     */
    public function remove($key)
    {
        unlink($this->data[ $key ]);

        return $this;
    }

    /**
     * @param $value
     * @return $this
     */
    public function push($value)
    {
        array_push($this->data, $value );

        return $this;
    }

    /**
     * @return mixed
     */
    public function pop()
    {
        return array_pop($this->data );
    }

    /**
     * @param $value
     * @return $this
     */
    public function unshift($value)
    {
        array_unshift($this->data, $value );

        return $this;
    }

    /**
     * @return mixed
     */
    public function shift()
    {
        return array_shift($this->data );
    }

    /**
     * @return ArrayCollection
     */
    public function reverse()
    {
        return new self( array_reverse( $this->data ) );
    }

    /**
     * @return mixed
     */
    public function first()
    {
        $values = array_values( $this->data );

        return array_shift( $values );
    }

    /**
     * @return mixed
     */
    public function last()
    {
        $values = array_values( $this->data );
        $values = array_reverse( $values );

        return array_shift( $values );
    }

    /**
     * @return ArrayCollection
     */
    public function keys()
    {
        return new self( array_keys( $this->data ) );
    }

    /**
     * @return ArrayCollection
     */
    public function values()
    {
        return new self( array_values( $this->data ) );
    }

    /**
     * @param $needle
     * @return false|int|string
     */
    public function search($needle)
    {
        return array_search( $needle, $this->data );
    }

    /**
     * @param callable $callable
     * @param null $parameter
     * @return ArrayCollection
     */
    public function map(callable $callable, $parameter = null)
    {
        $new = new self( $this->data );
        array_walk($new->data, $callable, $parameter );

        return $new;
    }

    /**
     * @param callable $callable
     * @return $this
     */
    public function each(callable $callable)
    {
        $index = 0;

        foreach ( $this->data as $key => $value ) {
            $callable( $key, $value, $index );

            $index++;
        }

        return $this;
    }

    /**
     * @param int $offset
     * @param int|null $length
     * @return ArrayCollection
     */
    public function slice(int $offset, ?int $length = null)
    {
        if ( $length < 0 ) {
            $length = null;
        }

        return new self( array_slice( $this->data, $offset, $length ) );
    }

    /**
     * @param $key
     * @return bool
     */
    public function has($key):bool
    {
        return isset( $this->data[ $key ] );
    }

    /**
     * @param $needle
     * @return bool
     */
    public function in($needle):bool
    {
        return in_array( $needle, $this->data );
    }

    /**
     * @return bool
     */
    public function isEmpty():bool
    {
        return empty( $this->data );
    }

    /**
     * @return int
     */
    public function count():int
    {
        return count( $this->data );
    }

    /**
     * @return mixed
     */
    public function random()
    {
        $new = new self( $this->data );
        array_rand( $new->data );

        return $new;
    }

    /**
     * @return ArrayCollection
     */
    public function shuffle()
    {
        $new = new self( $this->data );
        shuffle( $new->data );

        return $new;
    }

    /**
     * @return ArrayCollection
     */
    public function sort()
    {
        $new = new self( $this->data );
        sort($new->data );

        return $new;
    }

    /**
     * @return array
     */
    public function toArray():array
    {
        return $this->data;
    }

    /**
     * @return string
     */
    public function toJson():string
    {
        return json_encode( $this->toArray(), JSON_PRETTY_PRINT );
    }

    /**
     * Get the parameters as a json string
     *
     * @return string
     */
    public function __toString():string
    {
        return $this->toJson();
    }

    /**
     * @return $this
     */
    public function clear()
    {
        $this->data = [];

        return $this;
    }

    /**
     * Merge data of the collection with given data
     *
     * @param array $data
     * @return ArrayCollection
     */
    public function merge(array $data)
    {
        return new self( array_merge( $this->data, $data ) );
    }

    /**
     * return an array with value with only the $keys listed in arguments
     *
     * @param array $keys
     * @return ArrayCollection
     */
    public function only(array $keys)
    {
        $data = array_filter( $this->toArray(),
            function ( $key ) use ( $keys ) {
                return in_array($key, $keys);
            }, ARRAY_FILTER_USE_KEY );

        return new self( $data );
    }

    /**
     * return an array with values excepts the $keys listed in arguments
     *
     * @param array $keys
     * @return ArrayCollection
     */
    public function except(array $keys)
    {
        $data = array_filter( $this->toArray(),
            function ( $key ) use ( $keys ) {
                return !in_array($key, $keys);
            }, ARRAY_FILTER_USE_KEY );

        return new self( $data );
    }
}
