<?php

namespace App\Parsers;

use App\Contracts\ParserContract;
use App\Elements\HtmlDomElement;
use App\Support\Collection;

class HtmlParser implements ParserContract
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
     * Get all html elements.
     *
     * @return Collection
     */
    public function elements()
    {
        $elements = $this->parse($this->content);

        return Collection::collect($elements)
            ->map(function ($element) {
                return new HtmlDomElement($element);
            });
    }

    /**
     * Parse html content.
     *
     * @param string $html
     *
     * @return array
     */
    protected function parse(string $html)
    {
        $matches = [];

        $result = preg_match_all('/<\w+.*?>/', $html, $matches);

        if ($result === false) {
            return [];
        }

        return $matches[0];
    }
}
