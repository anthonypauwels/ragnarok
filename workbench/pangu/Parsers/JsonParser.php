<?php
namespace Pangu\Parsers;

use Pangu\Encoders\Exceptions\EncoderException;
use Pangu\FileSystem\FileSystem;
use Pangu\Encoders\JsonEncoder;

/**
 * Parse a file that contains JSON into an array
 *
 * @author Anthony Pauwels <hello@anthonypauwels.be>
 * @package Pangu\Common
 */
class JsonParser implements ParserInterface {
    /** @var JsonEncoder */
    protected $encoder;

    /**
     * JsonParser constructor.
     */
    public function __construct() {
        $this->encoder = new JsonEncoder();
    }

    /**
     * Parse a json file using JsonEncoder::decode()
     *
     * @param string $file_name
     * @return array
     *
     * @throws Exceptions\ParserException
     * @throws \Pangu\FileSystem\Exceptions\FileSystemException
     */
    public function parse(string $file_name):array {
        try {
            return (array) $this->encoder->decode(FileSystem::read($file_name));
        } catch ( EncoderException $e ) {
            throw new Exceptions\ParserException(sprintf('An error occurred while parsing file " %s " : %s', $file_name, $e->getMessage()), 200);
        }
    }
}
