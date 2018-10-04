<?php

namespace primus852\SimpleStopwatch;

class Stopwatch
{

    /**
     * @return \DateTime
     */
    public static function start()
    {
        return \DateTime::createFromFormat('U.u', microtime(true));
    }


    /**
     * @param \DateTime $time
     * @param bool $format_output
     * @param string $format
     * @return float|int|string
     * @throws StopwatchException
     */
    public static function stop(\DateTime $time, bool $format_output = false, string $format = 's')
    {
        $end = \DateTime::createFromFormat('U.u', microtime(true));
        $interval = $time->diff($end);

        return $format_output ? self::format_output($time, $format) : $interval->format('%h hours, %i minutes and %s seconds');
    }

    /**
     * @return string
     */
    public static function current()
    {
        $time = \DateTime::createFromFormat('U.u', microtime(true));

        return $time->format('Y-m-d H:i:s.u');
    }

    /**
     * @param \DateTime $start
     * @param $format
     * @return float|int|string
     * @throws StopwatchException
     */
    private static function format_output(\DateTime $start, $format)
    {

        $end = new \DateTime();
        $diff = $start->diff($end);
        $secs = $diff->format('%r') . (
                ($diff->s) +
                (60 * ($diff->i)) +
                (60 * 60 * ($diff->h)) +
                (24 * 60 * 60 * ($diff->d)) +
                (30 * 24 * 60 * 60 * ($diff->m)) +
                (365 * 24 * 60 * 60 * ($diff->y))
            );

        switch ($format){
            case 's':
                $output = $secs;
                break;
            case 'm':
                $output = $secs / 60;
                break;
            case 'h':
                $output = $secs / 60 / 60;
                break;
            case 'd':
                $output = $secs / 60 / 60 / 24;
                break;
            case 'y':
                $output = $secs / 60 / 60 / 24 / 365;
                break;
            default:
                throw new StopwatchException('Unknown format: '.$format);

        }

        return $output;

    }

}