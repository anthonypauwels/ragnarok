<?php
namespace Pangu\Common\Collections;

/**
 *
 * @TODO : rework this class
 * @author Anthony Pauwels <hello@anthonypauwels.be>
 * @package Pangu\Common
 */
class HashCollection extends ArrayCollection
{
    /** @var string */
    protected $objectClass;

    /**
     * HashCollection constructor.
     *
     * @param string $object_class
     * @param array $data
     * @throws Exceptions\CollectionException
     */
    public function __construct(string $object_class, array $data = [])
    {
        $this->objectClass = $object_class;

        foreach ( $data as $object ) {
            $this->put( $object );
        }
    }

    /**
     * Check if $object if an object and throw an exception if not
     *
     * @param $object
     * @throws Exceptions\CollectionException
     */
    protected function checkIntegrity($object)
    {
        if ( !is_object($object) || !($object instanceof $this->objectClass) ) {
            throw new Exceptions\CollectionException(sprintf('HashCollection can only handle object of class %s, %s given', $this->objectClass, gettype($object)), 200);
        }
    }

    /**
     * Get an object from collection
     *
     * @param $object
     * @return mixed
     * @throws Exceptions\CollectionException
     */
    public function get($object)
    {
        $this->checkIntegrity($object);

        return $this->data[ spl_object_hash($object) ];
    }

    /**
     * Put an object from collection
     *
     * @param $object
     * @return mixed
     * @throws Exceptions\CollectionException
     */
    public function put($object)
    {
        $this->checkIntegrity($object);

        $this->data[ spl_object_hash($object) ] = $object;

        return $object;
    }

    /**
     * Alias to put method
     *
     * @param $object
     * @return $this
     * @throws Exceptions\CollectionException
     */
    public function push($object)
    {
        $this->put($object);

        return $this;
    }

    /**
     * Cannot use set method
     *
     * @param $object
     * @param $value
     * @throws Exceptions\CollectionException
     */
    public function set($object, $value)
    {
        throw new Exceptions\CollectionException(sprintf('Method " %s " cannot be used on HashCollection use " push " method instead', __METHOD__), 200);
    }

    /**
     * Push an object to the start of the collection
     *
     * @param $object
     * @return $this
     * @throws Exceptions\CollectionException
     */
    public function unshift($object)
    {
        $this->checkIntegrity($object);

        $this->data = array_reverse($this->data);
        $this->push($object);
        $this->data = array_reverse($this->data);

        return $this;
    }

    /**
     * Search object $needle in the collection
     *
     * @param $object
     * @return bool|false|int|string
     * @throws Exceptions\CollectionException
     */
    public function search($object)
    {
        $this->checkIntegrity($object);

        return $this->data[ spl_object_hash($object) ] ?? false;
    }

    /**
     * Call $callable on each object of this collection
     *
     * @param callable $callable
     * @return $this
     */
    public function each(callable $callable)
    {
        $index = 0;

        foreach ( $this->data as $object ) {
            $callable($object, $index);

            $index++;
        }

        return $this;
    }

    /**
     * If object is set in the collection
     *
     * @param $object
     * @return bool
     * @throws Exceptions\CollectionException
     */
    public function has($object):bool
    {
        $this->checkIntegrity($object);

        return isset($this->data[ spl_object_hash($object) ]);
    }

    /**
     * Alias to has method
     *
     * @param $needle
     * @return bool
     * @throws Exceptions\CollectionException
     */
    public function in($needle):bool
    {
        return $this->has($needle);
    }

    /**
     * Remove an object from the collection
     *
     * @param $object
     * @return $this
     * @throws Exceptions\CollectionException
     */
    public function remove($object)
    {
        $this->checkIntegrity($object);

        unlink($this->data[ spl_object_hash($object) ]);

        return $this;
    }
}
