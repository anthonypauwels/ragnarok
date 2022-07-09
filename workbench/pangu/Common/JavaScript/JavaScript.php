<?php
namespace Pangu\Common\JavaScript;

use stdClass;
use JsonSerializable;
use InvalidArgumentException;
use Pangu\Encoders\JsonEncoder;
use Pangu\Common\Utility\Helpers;
use Pangu\Encoders\Exceptions\EncoderException;

/**
 * Handler to share variables between PHP and JavaScript
 *
 * @author Anthony Pauwels <hello@anthonypauwels.be>
 * @package Pangu\Common
 */
class JavaScript
{
    /** @var string */
    const DEFAULT_NAMESPACE = '__app';

    /** @var JavaScript */
    protected static JavaScript $instance;

    /** @var string */
    protected string $defaultNamespace = '';

    /** @var GroupNamespace[] */
    protected array $data = [];

    /**
     * Constructor
     *
     * @param string $default_namespace
     */
    public function __construct(string $default_namespace = self::DEFAULT_NAMESPACE)
    {
        $this->defaultNamespace = $default_namespace;

        $this->initDefaultNamespace( $this->defaultNamespace );
    }

    /**
     * Create a namespace if it does not exist
     *
     * @param string $namespace
     */
    protected function initDefaultNamespace(string $namespace): void
    {
        if ( isset( $this->data[ $namespace ] ) ) {
            return;
        }

        $this->data[ $namespace ] = new GroupNamespace( $namespace );
    }

    /**
     * Init a default instance called statically
     *
     * @param string $default_namespace
     * @return JavaScript
     */
    public static function init(string $default_namespace = self::DEFAULT_NAMESPACE):JavaScript
    {
        return self::$instance = new self( $default_namespace );
    }

    /**
     * Return the JavaScript instance
     *
     * @return JavaScript
     */
    public static function getInstance():JavaScript
    {
        if ( self::$instance ) {
            return self::$instance;
        }

        return self::init();
    }

    /**
     * Calling class methods statically
     *
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        $instance = self::getInstance();

        if ( !method_exists( $instance, $name ) ) {
            throw new InvalidArgumentException('[' . static::class . '::' . $name . '] method is not implemented');
        }

        return call_user_func_array( [ $instance, $name ], $arguments );
    }

    /**
     * Push a data in a namespace
     *
     * @param array|string $key
     * @param null $value
     * @param string|null $namespace
     * @return JavaScript
     */
    public function put(array|string $key, $value = null, ?string $namespace = null):JavaScript
    {
        if ( $namespace === null ) {
            $namespace = $this->defaultNamespace;
        }

        $this->initDefaultNamespace( $namespace );

        if ( is_array( $key ) && $value === null ) {
            $this->set( $key, $namespace );
        } else {
            $this->data[ $namespace ]->put( $key, $value );
        }

        return $this;
    }

    /**
     * Merge an array of data in a namespace
     *
     * @param array $data
     * @param string|null $namespace
     * @return JavaScript
     */
    public function set(array $data, ?string $namespace = null):JavaScript
    {
        if ( $namespace === null ) {
            $namespace = $this->defaultNamespace;
        }

        $this->initDefaultNamespace( $namespace );

        $this->data[ $namespace ]->set( $data );

        return $this;
    }

    /**
     * Get a data in a namespace by key
     *
     * @param string $key
     * @param string|null $namespace
     * @return mixed
     */
    public function get(string $key, ?string $namespace = null): mixed
    {
        if ( $namespace === null ) {
            $namespace = $this->defaultNamespace;
        }

        $this->initDefaultNamespace( $namespace );

        return $this->data[ $namespace ]->get( $key );
    }

    /**
     * Remove a data in a namespace by key
     *
     * @param string $key
     * @param string|null $namespace
     * @return JavaScript
     */
    public function forget(string $key, ?string $namespace = null):JavaScript
    {
        if ( $namespace === null ) {
            $namespace = $this->defaultNamespace;
        }

        $this->data[ $namespace ]->forget( $key );

        return $this;
    }

    /**
     * Get the data of a namespace
     *
     * @param string|null $namespace
     * @return GroupNamespace
     */
    public function namespace(?string $namespace = null):GroupNamespace
    {
        if ( !isset( $this->data[ $namespace ] ) ) {
            throw new InvalidArgumentException( sprintf( 'Namespace " %s " do not exists', $namespace ) );
        }

        return $this->data[ $namespace ];
    }

    /**
     * Render the JavaScript variables with or without script tags
     *
     * @param bool $script_tag
     * @return string
     *
     * @throws EncoderException
     */
    public function render(bool $script_tag = true):string
    {
        $ob = ( $script_tag ? '<script> ' : '' ) . PHP_EOL;

        foreach ( $this->data as $namespace => $data ) {
            $ob.= 'window.' . $namespace . ' = ' . $data->toJson() . ';' . PHP_EOL;
        }

        return $ob . ( $script_tag ? '</script> ' : '' ) . PHP_EOL;
    }

    /**
     * Print the JavaScript variables with or without script tags
     *
     * @param bool $script_tag
     *
     * @throws EncoderException
     */
    public function print(bool $script_tag = true):void
    {
        echo $this->render( $script_tag );
    }

    /**
     * Convert a value using the right converter method
     *
     * @param $value
     * @param bool $encode
     * @return mixed
     *
     * @throws EncoderException
     */
    public static function convertToJson($value, bool $encode = false): mixed
    {
        switch ( true ) {
            case Helpers::isCallable( $value ) && !is_string( $value ) :
                $value = self::convertCallableValue( $value );
                break;

            case is_array( $value ):
                $value = self::convertArrayValue( $value );
                break;

            case is_object( $value ):
                $value = self::convertObjectValue( $value );
                break;

            case is_string( $value ):
            case is_bool( $value ):
            case is_int( $value ):
            case is_float( $value ):
            case is_null( $value ):
                break;

            default :
                throw new InvalidArgumentException( sprintf( 'Can not transform given value " %s " into JavaScript', Helpers::varToString( $value ) ) );
        }

        if ( $encode ) {
            $encoder = new JsonEncoder();

            $value = $encoder->encode( $value );
        }

        return $value;
    }

    /**
     * Convert an array and all depths values into json
     *
     * @param $value
     * @return mixed
     *
     * @throws EncoderException
     */
    protected static function convertArrayValue($value): mixed
    {
        array_walk_recursive( $value, function ( &$item ) {
            $item = self::convertToJson( $item );
        } );

        return $value;
    }

    /**
     * Convert a Closure into a json string
     *
     * @param $value
     * @return mixed
     *
     * @throws EncoderException
     */
    protected static function convertCallableValue($value):string
    {
        /** Calling the Closure to get the value */
        return self::convertToJson( call_user_func( $value ) );
    }

    /**
     * Convert an object into a json string
     *
     * @param $value
     * @return mixed
     *
     * @throws EncoderException
     */
    protected static function convertObjectValue($value): mixed
    {
        /** If the object instanceof JsonSerializable or StdClass, it can cast itself */
        if ( $value instanceof JsonSerializable || $value instanceof StdClass ) {
            return $value;
        }

        /** Or we use a possible toArray method has fallback */
        if ( method_exists( $value, 'toArray' ) ) {
            return self::convertArrayValue ( $value->toArray() );
        }

        /** If the object has a toJson method, we call it */
        if ( method_exists( $value, 'toJson' ) ) {
            $encoder = new JsonEncoder();

            return $encoder->decode( $value->toJson() );
        }

        /** If the object can not cast using methods, we check if it can cast in string using magic method */
        if ( method_exists( $value, '__toString' ) ) {
            return (string) $value;
        }

        /** Not good, we throw an exception */
        throw new InvalidArgumentException( sprintf( 'Can not transform object(%s) to JavaScript', get_class( $value ) ) );
    }
}