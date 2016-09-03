<?php

namespace App\Elements;

use App\Contracts\ElementContract;

class BBCodeElement implements ElementContract
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
     * Get element name
     *
     * @return string
     */
    public function name()
    {
        preg_match('/\[\w+/', $this->content, $matches);

        return str_replace("[", '', $matches[0]);
    }
}
