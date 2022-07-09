<?php
namespace Pangu\Common\Utility;

/**
 * Utility Class for Integers and Mathematical Operations
 *
 * @author Anthony Pauwels <hello@anthonypauwels.be>
 * @package Pangu\Common
 */
abstract class Math
{
    /**
     * This class cannot be instanced
     */
    private function __construct()
    {

    }

    /**
     * Make readable octets size
     *
     * @param int $size
     * @return string
     */
    public static function convertOctetsSize(int $size):string
    {
        $unit = ['b','kb','mb','gb','tb','pb'];

        return round($size / pow(1024, ( $i = floor( log( $size, 1024 ) ) ) ), 2 ) . ' ' . strtoupper( $unit[ $i ] );
    }

    /**
     * Humanize a duration in millisecond
     *
     * @param int|float $duration
     * @return string
     */
    public static function convertDuration($duration):string
    {
        if ( $duration < 0.001 ) {
            return round($duration * 1000000 ) . ' μs';
        } else if ( $duration < 1 ) {
            return round($duration * 1000, 2 ) . ' ms';
        }

        return round( $duration, 2 ) . ' s';
    }

    /**
     * keep a integer between a min and a max values
     * ex : keepWithin(100, 50, 80) => 80
     *
     * @param int $value
     * @param int $min
     * @param int $max
     * @return int
     */
    public static function keepWithin(int $value, int $min, int $max):int
    {
        if ( $value < $min ) {
            return $min;
        }

        if ( $value > $max ) {
            return $max;
        }

        return $value;
    }
}
