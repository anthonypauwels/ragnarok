<?php
namespace Pangu\Common\DateTime;

/**
 * Class that extends PHP DateTime object
 *
 * @author Anthony Pauwels <hello@anthonypauwels.be>
 * @package Pangu\Common
 */
class DateTime extends \DateTime
{
    const SQL_DATE = 'Y-m-d';
    const SQL_TIME = 'H:i:s';
    const SQL_DATETIME = self::SQL_DATE . ' ' . self::SQL_TIME;
    const AMERICAN_DATE = 'Y m d';
    const AMERICAN_TIME = 'H:i:s';
    const AMERICAN_DATETIME = 'Y m d H:i:s';
    const EUROPEAN_DATE = 'd F Y';
    const EUROPEAN_TIME = 'H:i:s';
    const EUROPEAN_DATETIME = 'd F Y H:i:s';

    /**
     * Get DateTime for now
     *
     * @return DateTime
     * @throws \Exception
     */
    public static function now():DateTime
    {
        return new static( 'now' );
    }

    /**
     * Create a new DateTime object by passing year, month, day and times values
     *
     * @param int|null $year
     * @param int|null $month
     * @param int|null $day
     * @param int|null $hour
     * @param int|null $minute
     * @param int|null $second
     * @return DateTime
     *
     * @throws \Exception
     */
    public static function create(int $year = null, int $month = null, int $day = null, int $hour = null, int $minute = null, int $second = null):DateTime
    {
        $dateTime = self::now();
        $year = $year === null ? $dateTime->getYear() : $year;
        $month = $month === null ? $dateTime->getMonth() : $month;
        $day = $day === null ? $dateTime->getDay() : $day;
        $hour = $hour === null ? $dateTime->getHour() : $hour;
        $minute = $minute === null ? $dateTime->getMinute() : $minute;
        $second = $second === null ? $dateTime->getSecond() : $second;

        $dateTime->setDate( $year, $month, $day );
        $dateTime->setTime( $hour, $minute, $second );

        return $dateTime;
    }

    /**
     * Parse a datetime string into a DateTime object
     *
     * @param $time
     * @param string $format
     * @return DateTime
     *
     * @throws \Exception
     */
    public static function parse($time, $format = self::SQL_DATETIME):DateTime
    {
        if ( static::isTimestamp( $time ) ) {
            $dateTime = new static();
            $dateTime->setTimestamp( $time );

            return $dateTime;
        }

        return self::wrap( static::createFromFormat( $format, $time ) );
    }

    /**
     * Wrap a DateTime based object into a new DateTime
     *
     * @param \DateTime $originalDateTime
     * @return DateTime
     *
     * @throws \Exception
     */
    public static function wrap(\DateTime $originalDateTime):DateTime
    {
        return self::create(
            $originalDateTime->format( 'Y' ),
            $originalDateTime->format( 'm' ),
            $originalDateTime->format( 'd' ),
            $originalDateTime->format( 'H' ),
            $originalDateTime->format( 'i' ),
            $originalDateTime->format( 's' )
        );
    }

    /**
     * @param $name
     * @return int
     */
    public function __get($name)
    {
        switch ( $name ) {
            case 'second' :
            case 'seconds' :
                return (int) $this->getSecond();
                break;

            case 'minute' :
            case 'minutes' :
                return (int) $this->getMinute();
                break;

            case 'hour' :
            case 'hours' :
                return (int) $this->getHour();
                break;

            case 'day' :
            case 'days' :
                return (int) $this->getDay();
                break;

            case 'month' :
            case 'months' :
                return (int) $this->getMonth();
                break;

            case 'year' :
            case 'years' :
                return (int) $this->getYear();
                break;

            default :
                return 0;
        }
    }

    /**
     * Set a datetime value
     *
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        switch ( $name ) {
            case 'second' :
            case 'seconds' :
                $this->setSecond( $value );
                break;

            case 'minute' :
            case 'minutes' :
                $this->setMinute( $value );
                break;

            case 'hour' :
            case 'hours' :
                $this->setHour( $value );
                break;

            case 'day' :
            case 'days' :
                $this->setDay( $value );
                break;

            case 'month' :
            case 'months' :
                $this->setMonth( $value );
                break;

            case 'year' :
            case 'years' :
                $this->setYear( $value );
                break;
        }
    }

    /**
     * Get seconds
     *
     * @return int
     */
    public function getSecond():int
    {
        return (int) $this->format( '');
    }

    /**
     * Get minutes
     *
     * @return int
     */
    public function getMinute():int
    {
        return (int) $this->format( 'i');
    }

    /**
     * Get hours
     *
     * @return int
     */
    public function getHour():int
    {
        return (int) $this->format( 'H');
    }

    /**
     * Get days
     *
     * @return int
     */
    public function getDay():int
    {
        return (int) $this->format( 'd');
    }

    /**
     * Get months
     *
     * @return int
     */
    public function getMonth():int
    {
        return (int) $this->format( 'm');
    }

    /**
     * Get years
     *
     * @return int
     */
    public function getYear():int
    {
        return (int) $this->format( 'Y');
    }

    /**
     * Add one (or some) second
     *
     * @param int $value
     * @return DateTime
     */
    public function addSecond(int $value = 1):DateTime
    {
        return $this->addSeconds( $value );
    }

    /**
     * Add some seconds
     *
     * @param int $value
     * @return $this
     */
    public function addSeconds(int $value):DateTime
    {
        $this->modify( '+' . $value . ' second' );

        return $this;
    }

    /**
     * Add some minutes
     *
     * @param int $value
     * @return DateTime
     */
    public function addMinute(int $value = 1):DateTime
    {
        return $this->addMinutes( $value );
    }

    /**
     * Add some minutes
     *
     * @param int $value
     * @return DateTime
     */
    public function addMinutes(int $value):DateTime
    {
        $this->modify( '+' . $value . ' minute' );

        return $this;
    }

    /**
     * Add some hours
     *
     * @param int $value
     * @return DateTime
     */
    public function addHour(int $value = 1):DateTime
    {
        return $this->addHours( $value );
    }

    /**
     * Add some hours
     *
     * @param int $value
     * @return DateTime
     */
    public function addHours(int $value):DateTime
    {
        $this->modify( '+' . $value . ' hour' );

        return $this;
    }

    /**
     * Add some days
     *
     * @param int $value
     * @return DateTime
     */
    public function addDay(int $value = 1):DateTime
    {
        return $this->addDays( $value );
    }

    /**
     * Add some days
     *
     * @param int $value
     * @return DateTime
     */
    public function addDays(int $value):DateTime
    {
        $this->modify( '+' . $value . ' day' );

        return $this;
    }

    /**
     * Add some months
     *
     * @param int $value
     * @return DateTime
     */
    public function addMonth(int $value = 1):DateTime
    {
        return $this->addMonths( $value );
    }

    /**
     * Add some months
     *
     * @param int $value
     * @return DateTime
     */
    public function addMonths(int $value):DateTime
    {
        $this->modify( '+' . $value . ' month' );

        return $this;
    }

    /**
     * Add some years
     *
     * @param int $value
     * @return DateTime
     */
    public function addYear(int $value = 1):DateTime
    {
        return $this->addYears( $value );
    }

    /**
     * Add some years
     *
     * @param int $value
     * @return DateTime
     */
    public function addYears(int $value):DateTime
    {
        $this->modify( '+' . $value . ' year' );

        return $this;
    }

    /**
     * Sub some seconds
     *
     * @param int $value
     * @return DateTime
     */
    public function subSecond(int $value = 1):DateTime
    {
        return $this->subSeconds( $value );
    }

    /**
     * Sub some seconds
     *
     * @param int $value
     * @return DateTime
     */
    public function subSeconds(int $value):DateTime
    {
        $this->modify( '-' . $value . ' second' );

        return $this;
    }

    /**
     * Sub some minutes
     *
     * @param int $value
     * @return DateTime
     */
    public function subMinute(int $value = 1):DateTime
    {
        return $this->subMinutes( $value );
    }

    /**
     * Sub some minutes
     *
     * @param int $value
     * @return DateTime
     */
    public function subMinutes(int $value):DateTime
    {
        $this->modify( '-' . $value . ' minute' );

        return $this;
    }

    /**
     * Sub some hours
     *
     * @param int $value
     * @return DateTime
     */
    public function subHour(int $value = 1):DateTime
    {
        return $this->subHours( $value );
    }

    /**
     * Sub some hours
     *
     * @param int $value
     * @return DateTime
     */
    public function subHours(int $value):DateTime
    {
        $this->modify( '-' . $value . ' hour' );

        return $this;
    }

    /**
     * Sub some days
     *
     * @param int $value
     * @return DateTime
     */
    public function subDay(int $value = 1):DateTime
    {
        return $this->subDays( $value );
    }

    /**
     * Sub some days
     *
     * @param int $value
     * @return DateTime
     */
    public function subDays(int $value):DateTime
    {
        $this->modify( '-' . $value . ' day' );

        return $this;
    }

    /**
     * Sub some months
     *
     * @param int $value
     * @return DateTime
     */
    public function subMonth(int $value = 1):DateTime
    {
        return $this->subMonths( $value );
    }

    /**
     * Sub some months
     *
     * @param int $value
     * @return DateTime
     */
    public function subMonths(int $value):DateTime
    {
        $this->modify( '-' . $value . ' month' );

        return $this;
    }

    /**
     * Sub some years
     *
     * @param int $value
     * @return DateTime
     */
    public function subYear(int $value = 1):DateTime
    {
        return $this->subYear( $value );
    }

    /**
     * Sub some years
     *
     * @param int $value
     * @return DateTime
     */
    public function subYears(int $value):DateTime
    {
        $this->modify( '-' . $value . ' year' );

        return $this;
    }

    /**
     * Set the seconds
     *
     * @param int $value
     * @return DateTime
     */
    public function setSecond(int $value):DateTime
    {
        $this->setDate( (int) $this->format('H'), (int) $this->format('i'), $value );

        return $this;
    }

    /**
     * Set the minutes
     *
     * @param int $value
     * @return DateTime
     */
    public function setMinute(int $value):DateTime
    {
        $this->setDate( (int) $this->format('H'), $value, (int) $this->format('s') );

        return $this;
    }

    /**
     * Set the hours
     *
     * @param int $value
     * @return DateTime
     */
    public function setHour(int $value):DateTime
    {
        $this->setDate( $value, (int) $this->format('i'), (int) $this->format('s') );

        return $this;
    }

    /**
     * Set the days
     *
     * @param int $value
     * @return DateTime
     */
    public function setDay(int $value):DateTime
    {
        $this->setDate( (int) $this->format('Y'), (int) $this->format('m'), $value );

        return $this;
    }

    /**
     * Set the months
     *
     * @param int $value
     * @return DateTime
     */
    public function setMonth(int $value):DateTime
    {
        $this->setDate( (int) $this->format('Y'), $value, (int) $this->format('d') );

        return $this;
    }

    /**
     * Set the years
     *
     * @param int $value
     * @return DateTime
     */
    public function setYear(int $value):DateTime
    {
        $this->setDate( $value, (int) $this->format('m'), (int) $this->format('d') );

        return $this;
    }

    /**
     * Clone this object
     *
     * @return DateTime
     */
    public function clone():DateTime
    {
        return clone $this;
    }

    /**
     * Static format
     *
     * @param mixed $time
     * @param string $format
     * @return string
     *
     * @throws \Exception
     */
    public static function sFormat($time, string $format = self::SQL_DATETIME):string
    {
        return ( new static( $time ) )->format( $format );
    }

    /**
     * Print the current date in the given $format
     *
     * @param string $format
     * @return string
     *
     * @throws \Exception
     */
    public static function sNow(string $format = self::SQL_DATETIME) :string
    {
        return self::now()->format( $format );
    }

    /**
     * Get an array with the days of the year for each month
     *
     * @param int $year
     * @return array
     *
     * @throws \Exception
     */
    public static function getDaysFromYear(int $year):array {
        $calendar = [];

        $date = new static($year . '-01-01');

        while ( $date->getYear() <= $year ) {
            $month = $date->format('n');
            $day = $date->format('j');

            $calendar[ $month ][ $day ] = str_replace('0', '7', $date->format('w') );

            $date->addDay( 1 );
        }

        return $calendar;
    }

    /**
     * Check if the given parameter is a valid timestamp
     *
     * @param $timestamp
     * @return bool
     */
    protected static function isTimestamp($timestamp):bool
    {
        return is_numeric( $timestamp ) && (int) $timestamp == $timestamp;
    }

    /**
     * Return an array with
     *
     * @return array
     */
    public function toArray():array
    {
        return [
            'year' => $this->getYear(),
            'month' => $this->getMonth(),
            'day' => $this->getDay(),
            'dayOfWeek' => $this->format('w'),
            'dayOfYear' => $this->format('z'),
            'weekOfYear' => $this->format('W'),
            'hour' => $this->getHour(),
            'minute' => $this->getMinute(),
            'second' => $this->getSecond(),
            'micro' => $this->format('u'),
        ];
    }

    /**
     * Return a json from this DateTime
     *
     * @return string
     */
    public function toJson():string
    {
        return json_encode( $this->toArray() );
    }

    /**
     * Print the DateTime object with a formatted string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->format( self::SQL_DATETIME );
    }

    /**
     * Serialize a DateTime object
     *
     * @return array
     */
    public function __serialize():array
    {
        return $this->toArray();
    }

    /**
     * Unserialize a DateTime object
     *
     * @param array $data
     */
    public function __unserialize(array $data):void
    {
        $this->setDate( $data['year'], $data['month'], $data['day'] );
        $this->setTime( $data['hour'], $data['minute'], $data['second'] );
    }

    /**
     * Magic method used by Kint or var_dump
     *
     * @return array
     */
    public function __debugInfo()
    {
        return $this->toArray();
    }
}
