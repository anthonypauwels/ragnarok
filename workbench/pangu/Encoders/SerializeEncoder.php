<?php
namespace Pangu\Encoders;

/**
 * Encoder that uses php serialize and unserialize functions
 *
 * @author Anthony Pauwels <hello@anthonypauwels.be>
 * @package Pangu\Common
 */
class SerializeEncoder implements EncoderInterface
{
    /**
     * Encode with serialize
     *
     * @param $data
     * @return string
     */
    public function encode($data):string {
        return serialize($data);
    }

    /**
     * Decode with serialize
     *
     * @param string$data
     * @return mixed
     */
    public function decode(string $data) {
        return unserialize($data);
    }
}
