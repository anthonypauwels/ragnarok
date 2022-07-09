<?php
namespace Pangu\Parsers;

/**
 * Interface for Parsers objects
 *
 * @author Anthony Pauwels <hello@anthonypauwels.be>
 * @package Pangu\Common
 */
interface ParserInterface {
    /**
     * @param string $file_name
     * @return array
     */
    function parse(string $file_name):array;
}
