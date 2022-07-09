<?php
namespace Pangu\Common\JavaScript;

use Iterator;
use Countable;
use ArrayAccess;
use Serializable;
use InvalidArgumentException;

/**
 * Group the data into a namespace
 *
 * @author Anthony Pauwels <hello@anthonypauwels.be>
 * @package Pangu\Common
 */
class GroupNamespace implements ArrayAccess, Iterator, Countable, Serializable
{
    /** @var string */
    protected $name = '';
    /** @var array */
    protected $data = [];

    /**
     * Create the namespace and set the name
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Push a data in the namespace
     *
     * @param string|array $key
     * @param null $value
     * @return GroupNamespace
     */
    public function put($key, $value = null):GroupNamespace
    {
        if ( is_array( $key ) && $value === null ) {
            $this->set( $key );
        } else {
            $this->data[ $key ] = $value;
        }

        return $this;
    }

    /**
     * Merge an array of data in the namespace
     *
     * @param array $data
     * @return GroupNamespace
     */
    public function set(array $data):GroupNamespace
    {
        $this->data = array_merge( $this->data, $data );

        return $this;
    }

    /**
     * Get a data in the namespace by key
     *
     * @param string $key
     * @return mixed
     */
    public function get(string $key)
    {
        if ( !$this->has( $key ) ) {
            throw new InvalidArgumentException( sprintf( 'Variable " %s " do not exists in namespace " %s "', $key, $this->name ) );
        }

        return $this->data[ $key ];
    }

    /**
     * Check if a data in the namespace by key
     *
     * @param string $key
     * @return bool
     */
    public function has(string $key):bool
    {
        return isset( $this->data[ $key ] );
    }

    /**
     * Remove a data in the namespace by key
     *
     * @param string $key
     * @return GroupNamespace
     */
    public function forget(string $key):GroupNamespace
    {
        if ( !$this->has( $key ) ) {
            throw new InvalidArgumentException( sprintf( 'Variable " %s " do not exists in namespace " %s "', $key, $this->name ) );
        }

        unset( $this->data[ $key ] );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function offsetExists($offset)
    {
        return $this->has( $offset );
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($offset)
    {
        return $this->get( $offset );
    }

    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value)
    {
        $this->put( $offset, $value );
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset($offset)
    {
        $this->forget( $offset );
    }

    /**
     * @inheritDoc
     * @return mixed
     */
    public function rewind() {
        return reset( $this->data );
    }

    /**
     * @inheritDoc
     * @return mixed
     */
    public function current() {
        return current( $this->data );
    }

    /**
     * @inheritDoc
     * @return int|string|null
     */
    public function key() {
        return key( $this->data );
    }

    /**
     * @inheritDoc
     * @return mixed
     */
    public function next() {
        return next( $this->data );
    }

    /**
     * @inheritDoc
     * @return bool
     */
    public function valid() {
        return key( $this->data ) !== null;
    }

    /**
     * @inheritDoc
     */
    public function count()
    {
        return count( $this->data );
    }

    /**
     * @inheritDoc
     */
    public function serialize()
    {
        return serialize( $this->data );
    }

    /**
     * @inheritDoc
     */
    public function unserialize($serialized)
    {
        $this->data = $this->unserialize( $serialized );
    }

    /**
     * Return a json string of the data
     *
     * @throws \Pangu\Encoders\Exceptions\EncoderException
     */
    public function toJson()
    {
        return JavaScript::convertToJson( $this->data, true );
    }
}