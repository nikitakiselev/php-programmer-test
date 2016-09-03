<?php

namespace App\Console;

class Console
{
    const COLOR_INFO = '1;32';

    /**
     * Print a line to console
     *
     * @param $text
     */
    public static function line($text)
    {
        print $text . PHP_EOL;
    }

    /**
     * Return colored string
     *
     * @param string $string
     * @param string $color
     * @return string
     */
    public function colored(string $string, string $color)
    {
        return "\033[" . $color . "m" . $string . "\033[0m";
    }

    /**
     * Print a labeled line
     *
     * @param $label
     * @param $value
     */
    public function labeled($label, $value)
    {
        return static::line(static::colored($label, static::COLOR_INFO) . $value);
    }
}
