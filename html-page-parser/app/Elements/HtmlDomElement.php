<?php

namespace App\Elements;

use App\Contracts\ElementContract;

class HtmlDomElement implements ElementContract
{
    /**
     * @var string
     */
    private $html;

    /**
     * @param string $html
     */
    public function __construct(string $html)
    {
        $this->html = $html;
    }

    /**
     * Get element name.
     *
     * @return string
     */
    public function name()
    {
        preg_match('/<\w+/', $this->html, $matches);

        return str_replace('<', '', $matches[0]);
    }
}
