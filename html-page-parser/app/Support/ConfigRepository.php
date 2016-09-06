<?php

namespace App\Support;

class ConfigRepository
{
    /**
     * @var array
     */
    private $items;

    /**
     * @param array $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * Get config value.
     *
     * @param string     $key
     * @param mixed|null $default
     *
     * @return mixed|null
     */
    public function get(string $key, $default = null)
    {
        return $this->items[$key] ?? $default;
    }
}
