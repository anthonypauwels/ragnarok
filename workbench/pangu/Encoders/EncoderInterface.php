<?php
namespace Pangu\Encoders;

/**
 * Interface for encoders objects
 *
 * @author Anthony Pauwels <hello@anthonypauwels.be>
 * @package Pangu\Common
 */
interface EncoderInterface
{
    /**
     * Encode the data into a string
     *
     * @param $data
     * @return string
     */
    public function encode($data):string;

    /**
     * Return the data from the encoded string
     *
     * @param string $data
     * @return mixed
     */
    public function decode(string $data);
}