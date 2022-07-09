<?php
namespace Pangu\Encoders;

/**
 * Specific Encoder that convert data into a php array
 *
 * @author Anthony Pauwels <hello@anthonypauwels.be>
 * @package Pangu\Encoders
 */
class PhpEncoder implements EncoderInterface
{
    /**
     * Use var_export to convert $data into php code
     *
     * @param $data
     * @return string
     */
    public function encode($data):string {
        return '<?php return ' . var_export($data, true) . ';';
    }

    /**
     * @param string $data
     * @return mixed
     */
    public function decode(string $data) {
        return $data;
    }
}