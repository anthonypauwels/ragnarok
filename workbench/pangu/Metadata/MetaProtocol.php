<?php
namespace Pangu\Metadata;

/**
 * Class MetaProtocol
 * @package Pangu\Metadata
 */
final class MetaProtocol
{
    /** @var int All meta tags */
    const ALL = 1;
    /** @var int Only common meta tags */
    const META = 2;
    /** @var int Only Twitter meta tags */
    const TWITTER = 4;
    /** @var int Only Opengraph meta tags */
    const OPENGRAPH = 8;

    private function __construct()
    {
        //
    }
}