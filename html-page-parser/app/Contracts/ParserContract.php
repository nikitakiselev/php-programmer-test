<?php

namespace App\Contracts;

interface ParserContract
{
    /**
     * Get elements collection.
     *
     * @return \App\Support\Collection
     */
    public function elements();
}
