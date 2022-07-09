<?php
namespace Pangu\Parsers;

use SplFileObject;

/**
 * @author Anthony Pauwels <hello@anthonypauwels.be>
 * @package Pangu\Common
 */
class CsvParser implements ParserInterface {
    /**
     * Parse a CSV file into array
     *
     * @param string $file_name
     * @return array
     */
    public function parse(string $file_name):array {
        $splFileObject = new SplFileObject($file_name);
        $splFileObject->setFlags(SplFileObject::READ_CSV | SplFileObject::SKIP_EMPTY);

        $parsed = [];

        foreach( $splFileObject as $row ) {
            list( $key, $value ) = $row;
            $parsed[$key] = $value;
        }

        unset($splFileObject);

        return $parsed;
    }
}
