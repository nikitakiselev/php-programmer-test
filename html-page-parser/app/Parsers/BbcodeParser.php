<?php

namespace App\Parsers;

use App\Support\Collection;
use App\Elements\BBCodeElement;
use App\Contracts\ParserContract;

class BBCodeParser implements ParserContract
{
    /**
     * @var string
     */
    private $content;

    /**
     * @param string $content
     */
    public function __construct(string $content)
    {
        $this->content = $content;
    }

    /**
     * Get all bbcode elements
     *
     * @return Collection
     */
    public function elements()
    {
        if ($elements = $this->parse($this->content)) {
            return Collection::collect($elements)
                ->map(function($element) {
                    return new BBCodeElement($element);
                });
        }

        return [];
    }

    /**
     * Find bbcode elements
     *
     * @param string $content
     * @return array
     */
    protected function parse(string $content)
    {
        $matches = [];

        $result = preg_match_all('/\[\w+.*?\]/', $content, $matches);

        if ($result === false) {
            return [];
        }

        return $matches[0];
    }
}
