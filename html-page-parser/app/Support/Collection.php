<?php

namespace App\Support;

use ArrayAccess;
use ArrayIterator;
use Countable;
use IteratorAggregate;
use Traversable;

class Collection implements ArrayAccess, Countable, IteratorAggregate
{
    /**
     * @var array
     */
    private $elements;

    /**
     * @param array $elements
     */
    public function __construct(array $elements = [])
    {
        $this->elements = $elements;
    }

    /**
     * @param array $elements
     *
     * @return \App\Support\Collection
     */
    public static function collect(array $elements)
    {
        return new static($elements);
    }

    /**
     * Get the values of field.
     *
     * @param string $field
     *
     * @return array
     */
    public function pluck(string $field)
    {
        return array_map(function ($item) use ($field) {
            if (is_array($item)) {
                return array_key_exists($field, $item) ? $item[$field] : null;
            }

            if (is_object($item)) {
                return call_user_func([$item, $field]);
            }

            return $item;
        }, $this->elements);
    }

    /**
     * Mapping collection.
     *
     * @param callable $callback
     *
     * @return static
     */
    public function map(callable $callback)
    {
        return new static(array_map($callback, $this->elements));
    }

    /**
     * Get unique elements of collection.
     *
     * @param string $field Unique field
     *
     * @return static
     */
    public function unique(string $field)
    {
        return new static(
            array_values(
                array_unique($this->pluck($field))
            )
        );
    }

    /**
     * Count elements of an object.
     *
     * @link http://php.net/manual/en/countable.count.php
     *
     * @return int The custom count as an integer.
     *             </p>
     *             <p>
     *             The return value is cast to an integer.
     *
     * @since 5.1.0
     */
    public function count()
    {
        return count($this->elements);
    }

    /**
     * Implode collection elements with delimiter.
     *
     * @param string $delimiter Delimiter
     *
     * @return string
     */
    public function implode($delimiter)
    {
        return implode($delimiter, $this->elements);
    }

    /**
     * Print collection elements to line.
     *
     * @param string $delimiter
     *
     * @return string
     */
    public function inline($delimiter = ', ')
    {
        return $this->implode($delimiter);
    }

    /**
     * Whether a offset exists.
     *
     * @link http://php.net/manual/en/arrayaccess.offsetexists.php
     *
     * @param mixed $offset <p>
     *                      An offset to check for.
     *                      </p>
     *
     * @return bool true on success or false on failure.
     *              </p>
     *              <p>
     *              The return value will be casted to boolean if non-boolean was returned.
     *
     * @since 5.0.0
     */
    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->elements);
    }

    /**
     * Offset to retrieve.
     *
     * @link http://php.net/manual/en/arrayaccess.offsetget.php
     *
     * @param mixed $offset <p>
     *                      The offset to retrieve.
     *                      </p>
     *
     * @return mixed Can return all value types.
     *
     * @since 5.0.0
     */
    public function offsetGet($offset)
    {
        return $this->elements[$offset];
    }

    /**
     * Offset to set.
     *
     * @link http://php.net/manual/en/arrayaccess.offsetset.php
     *
     * @param mixed $offset <p>
     *                      The offset to assign the value to.
     *                      </p>
     * @param mixed $value  <p>
     *                      The value to set.
     *                      </p>
     *
     * @return void
     *
     * @since 5.0.0
     */
    public function offsetSet($offset, $value)
    {
        $this->elements[$offset] = $value;
    }

    /**
     * Offset to unset.
     *
     * @link http://php.net/manual/en/arrayaccess.offsetunset.php
     *
     * @param mixed $offset <p>
     *                      The offset to unset.
     *                      </p>
     *
     * @return void
     *
     * @since 5.0.0
     */
    public function offsetUnset($offset)
    {
        unset($this->elements[$offset]);
    }

    /**
     * Retrieve an external iterator.
     *
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     *
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     *                     <b>Traversable</b>
     *
     * @since 5.0.0
     */
    public function getIterator()
    {
        return new ArrayIterator($this->elements);
    }
}
