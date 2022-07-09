<?php
namespace Pangu\Encoders;

use Pangu\Encoders\Exceptions\JsonException;

/**
 * Specific Encoder and Decoder for JSON data
 *
 * @author Anthony Pauwels <hello@anthonypauwels.be>
 * @package Pangu\Common
 */
class JsonEncoder implements EncoderInterface
{
    /** @var int */
    protected $options = 0;
    /** @var int */
    protected $depth = 512;

    /**
     * Constructor. Define base options for decoding and encoding
     *
     * @param int $options
     * @param int $depth
     */
    public function __construct(int $options = JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT, int $depth = 512) {
        $this->setOptions( $options );
        $this->setDepth( $depth );
    }

    /**
     * Set JSON encode and decode options
     *
     * @param int $options
     * @return $this
     */
    public function setOptions(int $options) {
        $this->options = $options;

        return $this;
    }

    /**
     * Set the JSON encode and decode depth
     *
     * @param int $depth
     * @return $this
     */
    public function setDepth(int $depth) {
        $this->depth = $depth;

        return $this;
    }

    /**
     * Encode with json_encode
     *
     * @param $data
     * @return string
     */
    public function encode($data):string {
        return json_encode( $data, $this->options, $this->depth );
    }

    /**
     * Decode a json string with json_decode into an array
     *
     * @param string $data
     * @return mixed
     *
     * @throws Exceptions\EncoderException
     */
    public function decode(string $data) {
        try {
            return $this->internalDecode( $data, true, $this->depth );
        } catch ( JsonException $exception ) {
            throw new Exceptions\EncoderException($exception->getMessage(), 200, $exception);
        }
    }

    /**
     * Decode a json string with json_decode into a stdClass obj
     *
     * @param $data
     * @return mixed
     * @throws Exceptions\EncoderException
     */
    public function decodeObj($data) {
        try {
            return $this->internalDecode( $data, false, $this->depth );
        } catch ( JsonException $exception ) {
            throw new Exceptions\EncoderException($exception->getMessage(), 200, $exception);
        }
    }

    /**
     * Check if the given json string is well formatted
     *
     * @param string $json
     * @param string $error
     * @return bool
     */
    public function check(string $json, string &$error = '') {
        try {
            $this->internalDecode($json, true, $this->depth);

            return true;
        } catch ( JsonException $exception ) {
            $error = $exception->getMessage();

            return false;
        }
    }

    /**
     * Method to handle json_decode with error handling and exception
     *
     * @param $json
     * @param bool $assoc
     * @param int $depth
     * @return mixed
     *
     * @throws JsonException
     */
    private function internalDecode($json, $assoc = false, $depth = 512) {
        if ( version_compare( phpversion(), '7.3.0', '<') ) {
            $decoded = json_decode( $json, $assoc, $depth );

            if ( ( $error_code = json_last_error() ) !== JSON_ERROR_NONE ) {
                throw new JsonException( self::getErrorMessage( $error_code ), $error_code );
            }

            return $decoded;
        } else {
            /** json_decode now can throw an exception in PHP7.3+ */

            try {
                return json_decode( $json, $assoc, $depth, JSON_THROW_ON_ERROR );
            } catch ( \Exception $exception ) {
                throw new JsonException( $exception->getMessage(), $exception->getCode() );
            }
        }
    }

    /**
     * Return the code
     *
     * @param int $error_code
     * @return string
     */
    protected static function getErrorMessage(int $error_code):string
    {
        switch ( $error_code ) {
            case \JSON_ERROR_DEPTH:
                return 'The maximum stack depth has been exceeded';

            case \JSON_ERROR_STATE_MISMATCH:
                return 'Invalid or malformed JSON';

            case \JSON_ERROR_CTRL_CHAR:
                return 'Control character error, possibly incorrectly encoded';

            case \JSON_ERROR_SYNTAX:
                return 'Syntax error';

            case \JSON_ERROR_UTF8:
                return 'Malformed UTF-8 characters, possibly incorrectly encoded';

            case \JSON_ERROR_RECURSION:
                return 'One or more recursive references in the value to be encoded';

            case \JSON_ERROR_INF_OR_NAN:
                return 'One or more NAN or INF values in the value to be encoded';

            case \JSON_ERROR_UNSUPPORTED_TYPE:
                return 'A value of a type that cannot be encoded was given';
            default:
                return '';
        }
    }
}
