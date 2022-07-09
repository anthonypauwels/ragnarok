<?php
namespace Pangu\Common\Utility;

/**
 * Utility Class for Strings
 *
 * @author Anthony Pauwels <hello@anthonypauwels.be>
 * @package Pangu\Common
 */
abstract class Str
{
    /**
     * This class cannot be instanced
     */
    private function __construct() {

    }

    /**
     * Sanitize a string with removing all specials characters
     *
     * @param string $string
     * @return string
     */
    public static function removeSpecialsCharacters(string $string):string
    {
        $a = ['À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð',
            'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã',
            'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ',
            'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ',
            'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę',
            'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī',
            'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ',
            'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ',
            'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť',
            'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ',
            'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ',
            'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ',];

        $b = ['A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O',
            'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c',
            'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u',
            'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D',
            'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g',
            'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K',
            'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o',
            'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S',
            's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W',
            'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i',
            'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o',];

        return str_replace( $a, $b, $string );
    }

    /**
     * Transform a string into a slug
     * ex : The quick brown fox jumps over the lazy dog => the-quick-brown-fox-jumps-over-the-lazy-dog
     *
     * @param string $string
     * @param string $separator
     * @return string
     */
    public static function slug(string $string, string $separator = '_'):string
    {
        return trim(mb_strtolower( preg_replace( [ '/[^a-zA-Z0-9 \'-]/', '/[ -\']+/', '/^-|-$/' ], [ '', $separator, '' ], self::removeSpecialsCharacters( $string ) ) ), $separator );
    }

    /**
     * Build a valid URL string with queries parameters
     *
     * @param $url
     * @param array $params
     * @return string
     */
    public static function buildUrl($url, array $params = []):string
    {
        if ( !empty( $params )  ) {
            $url = self::endsWith('?', $url ) ? $url : '?' . $url;
        }

        return $url . Arr::query( $params );
    }

    /**
     * Generate a random string, useful for tokens
     *
     * @param int $length
     * @return string
     */
    public static function generateRandomString(int $length = 8):string
    {
        $string = str_shuffle( str_repeat( str_shuffle( '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_' ), $length * 3 ) );

        return str_shuffle( substr( $string, rand( 0, mb_strlen( $string ) - $length - 1 ), $length ) );
    }

    /**
     * Alias method to generateRandomString
     *
     * @param int $length
     * @return string
     */
    public static function random(int $length = 8):string
    {
        return static::generateRandomString( $length );
    }

    /**
     * Sanitize a path, converting slashes and antislashes with the os' directory separator
     *
     * @param string $path
     * @return string
     */
    public static function sanitizePath(string $path):string
    {
        return str_replace( [ '/', '\\' ], DIRECTORY_SEPARATOR, $path );
    }

    /**
     * Return the relative path from two paths
     *
     * @param string $from
     * @param string $to
     * @return string
     */
    public static function relativePath(string $from, string $to):string
    {
        // some compatibility fixes for Windows paths
        $from = is_dir( $from ) ? rtrim( $from, '\/') . '/' : $from;
        $to = is_dir( $to ) ? rtrim( $to, '\/') . '/' : $to;
        $from = self::sanitizePath( $from );
        $to = self::sanitizePath( $to );

        $from = explode(DIRECTORY_SEPARATOR, $from );
        $to = explode(DIRECTORY_SEPARATOR, $to );
        $relative_path = $to;

        foreach ( $from as $depth => $dir) {
            // find first non-matching dir
            if( $dir === $to[ $depth ] ) {
                // ignore this directory
                array_shift($relative_path );
            } else {
                // get number of remaining dirs to $from
                $remaining = count( $from ) - $depth;

                if ( $remaining > 1 ) {
                    // add traversals up to first matching dir
                    $pad_length = ( count( $relative_path ) + $remaining - 1 ) * -1;
                    $relative_path = array_pad( $relative_path, $pad_length, '..' );
                    break;
                } else {
                    $relative_path[0] = '.' . DIRECTORY_SEPARATOR . $relative_path[0];
                }
            }
        }

        return implode(DIRECTORY_SEPARATOR, $relative_path);
    }

    /**
     *
     *
     * @param string $in_input
     * @param string $needle
     * @return int
     */
    public static function strrevpos(string $in_input, string $needle):int
    {
        $rev_pos = strpos( strrev( $in_input ), strrev( $needle ) );

        if ($rev_pos === false) {
            return strlen( $in_input );
        } else {
            return strlen( $in_input ) - $rev_pos - strlen( $needle );
        }
    }

    /**
     * Replace the first occurrence of $needle by $replace in the string $in_that
     *
     * @param string $needle
     * @param string $replace
     * @param string $in_that
     * @return string
     */
    public static function replaceFirst(string $needle, string $replace, string $in_that):string
    {
        if ( ( $pos = strpos( $needle, $in_that ) ) !== false ) {
            return substr_replace($in_that, $replace, $pos, strlen($needle) );
        }

        return $in_that;
    }

    /**
     * Replace the last occurrence of $needle by $replace in the string $in_that
     *
     * @param string $needle
     * @param string $replace
     * @param string $in_that
     * @return string
     */
    public static function replaceLast(string $needle, string $replace, string $in_that):string
    {
        if ( ( $pos = strrpos( $needle, $in_that ) ) !== false ) {
            return substr_replace( $in_that, $replace, $pos, strlen( $needle ) );
        }

        return $in_that;
    }

    /**
     * Check if the string $in_that contains the $needle value
     *
     * @param string $needle
     * @param string $in_that
     * @return bool
     */
    public static function contains(string $needle, string $in_that):bool
    {
        return strpos( $in_that, $needle ) !== false;
    }

    /**
     * Determine if a string starts with the given needle
     *
     * @param string $needle
     * @param string $in_that
     * @return bool
     */
    public static function startsWith(string $needle, string $in_that):bool
    {
        return strpos( $in_that, $needle ) === 0;
    }

    /**
     * Determine if a string ends with the given needle
     *
     * @param string $needle
     * @param string $in_that
     * @return bool
     */
    public static function endsWith(string $needle, string $in_that):bool
    {
        return strpos( $in_that, $needle ) === strlen( $in_that ) - strlen( $needle );
    }

    /**
     * Get a segment of string $in_that, cut after the first occurrence of $needle
     * ex : after('.', 'filename.min.css') => min.css
     *
     * @param string $needle
     * @param string $in_that
     * @return string
     */
    public static function after(string $needle, string $in_that):string
    {
        if ( !is_bool( strpos( $in_that, $needle ) ) ) {
            return substr( $in_that, strpos( $in_that, $needle ) + strlen( $needle ) );
        }

        return '';
    }

    /**
     * Get a segment of string $in_that, cut after the first occurrence of $needle
     * ex : afterLast('.', 'filename.min.css') => css
     *
     * @param string $needle
     * @param string $in_that
     * @return string
     */
    public static function afterLast(string $needle, string $in_that):string
    {
        if ( !is_bool( self::strrevpos( $in_that, $needle ) ) ) {
            return substr( $in_that, self::strrevpos( $in_that, $needle ) + strlen( $needle ) );
        }

        return '';
    }

    /**
     * Get a segment of string $in_that, cat before the first occurrence of $needle
     * ex : before('.', 'filename.min.css') => filename
     *
     * @param string $needle
     * @param string $in_that
     * @return string
     */
    public static function before(string $needle, string $in_that):string
    {
        return substr( $in_that, 0, strpos( $in_that, $needle ) );
    }

    /**
     * Get a segment of string $in_that, cut before the last occurrence of $in_that
     * ex : beforeLast('.', 'filename.min.css') => filename.min
     *
     * @param string $needle
     * @param string $in_that
     * @return string
     */
    public static function beforeLast(string $needle, string $in_that):string
    {
        return substr( $in_that, 0, self::strrevpos( $in_that, $needle ) );
    }

    /**
     * Get a segment of string $in_that, cut between two firsts occurrences
     * ex : between('.', '.', 'filename.min.css') => min
     *
     * @param string $needle
     * @param string $that
     * @param string $in_that
     * @return string
     */
    public static function between(string $needle, string $that, string $in_that):string
    {
        return self::before( $that, self::after( $needle, $in_that ) );
    }

    /**
     * Get a segment of string $in_that, cut between two lasts occurrences
     * ex : betweenLast('.', '.', 'filename.min.css') => min
     *
     * @param string $needle
     * @param string $that
     * @param string $in_that
     * @return string
     */
    public static function betweenLast(string $needle, string $that, string $in_that):string
    {
        return self::afterLast( $needle, self::beforeLast( $that, $in_that ) );
    }

    /**
     * Convert a string in snake_case into PascalCase
     * ex : my_function_name => MyFunctionName
     *
     * @param string $string
     * @param mixed $separator
     * @return string
     */
    public static function pascalize(string $string, $separator = '_'):string
    {
        $separator = is_array( $separator ) ? $separator : [ $separator ];

        foreach ( $separator as $delimiter ) {
            $string = ucwords( $string, $delimiter );
        }

        return str_replace( $separator, '', $string );
    }

    /**
     * Convert a string in snake_case into camelCase
     * ex : my_function_name => myFunctionName
     *
     * @param string $string
     * @param mixed $separator
     * @return string
     */
    public static function camelize(string $string, $separator = '_'):string
    {
        return lcfirst( self::pascalize( $string, $separator ) );
    }

    /**
     * Convert a string in CamelCase or pascalCase into snake_case
     * ex : MyFunctionName => my_function_name
     *
     * @param string $string
     * @param string $separator
     * @return string
     */
    public static function snakelize(string $string, string $separator = '_'):string
    {
        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $string, $matches);
        $ret = $matches[0];

        foreach ( $ret as &$match ) {
            $match = $match == strtoupper( $match ) ? strtolower( $match ) : lcfirst( $match );
        }

        return implode( $separator, $ret );
    }

    /**
     * Alias to snakelize method using hyphens instead of underscores
     *
     * @param string $string
     * @return string
     */
    public static function spinalize(string $string):string
    {
        return self::snakelize( $string, '-' );
    }

    /**
     * Alias to snakelize method but apply an uppercase. Screaming Snake Case is often used for constants name
     *
     * @param string $string
     * @return string
     */
    public static function screamingSnakelize(string $string):string
    {
        return strtoupper( self::snakelize( $string ) );
    }

    /**
     * Interpolate a string with variables
     * Ex : String::Util('The quick {color} fox jumps over the lazy {animal}', ['color' => 'brown', 'animal' => 'dog']);
     * = > The quick brown fox jumps over the lazy dog
     *
     * @param string $string
     * @param array $data
     * @return string
     */
    public static function interpolate(string $string, array $data = []):string
    {
        $replace = [];

        foreach ( $data as $key => $value ) {
            $replace[ '{' . $key . '}' ] = $value;
        }

        return strtr( $string, $replace );
    }

    /**
     * Get the base class name
     * ex : Foo\Bar => Bar
     *
     * @param string $class_class
     * @return string
     */
    public static function className(string $class_class):string
    {
        return self::afterLast( '\\', $class_class );
    }

    /**
     * Get the namespace of a class
     * ex : Foo\Bar => Foo
     *
     * @param string $class_class
     * @return string
     */
    public static function namespace(string $class_class):string
    {
        return self::beforeLast( '\\', $class_class );
    }

    /**
     * Compares two alphanumeric characters strings
     *
     * @param $first_string
     * @param $second_string
     * @return bool
     */
    public static function equals($first_string, $second_string):bool
    {
        if ( strlen( $first_string ) !== strlen( $second_string ) ) {
            return false;
        }

        return strpos( $first_string, $second_string, 0 ) !== false;
    }

    /**
     * Explode a string into array using a delimiter or many delimiters
     * Usage : Str::explode(['|', '/', '.'], 'foo.bar|doo'); => 'foo', 'bar', 'doo'
     *
     * @param $delimiters
     * @param string $string
     * @return array
     */
    public static function explode($delimiters, string $string):array
    {
        $delimiters = array_keys( Arr::wrap( $delimiters ) );

        return explode( $delimiters[0], str_replace( $delimiters, $delimiters[0], $string ) );
    }
}
