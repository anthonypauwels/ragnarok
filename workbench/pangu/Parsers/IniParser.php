<?php
namespace Pangu\Parsers;

/**
 *
 *
 * @author Anthony Pauwels <hello@anthonypauwels.be>
 * @package Pangu\Common
 */
class IniParser implements ParserInterface {
    /** @var bool */
    const PROCESS_SECTIONS = true;
    /** @var bool */
    const NO_PROCESS_SECTIONS = false;

    /** @var bool */
    protected $mode;

    /**
     * IniParser constructor.
     *
     * @param bool $mode
     */
    public function __construct(bool $mode = self::NO_PROCESS_SECTIONS) {
        $this->mode = $mode;
    }

    /**
     * Parse an ini $file_name
     *
     * @param string $file_name
     * @return array
     */
    public function parse(string $file_name):array {
        return parse_ini_file($file_name, $this->mode);
    }
}
