<?php
namespace Pangu\Encoders;

/**
 * Encoder that uses php base64 functions
 *
 * @author Anthony Pauwels <hello@anthonypauwels.be>
 * @package Pangu\Common
 */
class Base64Encoder implements EncoderInterface
{
    /**
     * Encode with base64_encode
     *
     * @param $data
     * @return string
     */
    public function encode($data):string {
        return base64_encode( $data );
    }

    /**
     * Decode with base64_decode
     *
     * @param string$data
     * @return mixed
     */
    public function decode(string $data) {
        return base64_decode( $data, true );
    }

    /**
     * Verifies whether or not the provided string is a valid base64 string
     *
     * @param string $string
     * @return bool
     */
    public function isBase64(string $string)
    {
        $decoded_data = $this->decode( $string );
        $encoded_data = $this->encode( $decoded_data );

        return $encoded_data != $string;
    }
}
