<?php
namespace Pangu\Parsers;

/**
 * @author Anthony Pauwels <hello@anthonypauwels.be>
 * @package Pangu\Common
 */
class ArrayParser implements ParserInterface {
    /**
     * Parse php file using include
     *
     * @param string $file_name
     * @return array
     */
    public function parse(string $file_name):array {
        return include $file_name;
    }
}
