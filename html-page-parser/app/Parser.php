<?php

namespace App;

use InvalidArgumentException;
use App\Contracts\ParserContract;

class Parser
{
    /**
     * Create parser instance
     *
     * @param string $content
     * @param string $format
     * @return ParserContract
     */
    public static function factory(string $content, string $format = 'html')
    {
        $parser = "App\\Parsers\\".ucfirst(strtolower($format))."Parser";

        if (class_exists($parser)) {
            return new $parser($content);
        }

        throw new InvalidArgumentException("Parser for {$format} not found.");
    }
}
