<?php
namespace Pangu\Parsers;

use DOMDocument;

/**
 * @author Anthony Pauwels <hello@anthonypauwels.be>
 * @package Pangu\Common
 */
abstract class XmlParser implements ParserInterface {
    /**
     * Parse XML into array
     *
     * @param string $file_name
     * @return array
     * @throws Exceptions\ParserException
     */
    public function parse(string $file_name):array {
        $document = new DOMDocument();
        $document->load($file_name);

        $parsed_value = $this->doParse($document);

        if ( !is_array( $parsed_value ) ) {
            throw new Exceptions\ParserException(sprintf('An error occurred while parsing file " %s "', $file_name), 200);
        }

        return $parsed_value;
    }

    /**
     * You must override this class and implement this method for use this parser
     *
     * @param DOMDocument $document
     * @return mixed
     */
    abstract function doParse(DOMDocument $document);
}
