<?php

namespace Diacdg\Util;

class SimpleList implements \ArrayAccess, \IteratorAggregate, \Countable
{
    protected $elements = [];
    protected $valueType;

    public function __construct(string $valueType) {
        $this->valueType = $valueType;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->elements);
    }

    public function offsetExists($offset)
    {
        return isset($this->elements[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->offsetExists($offset)?$this->elements[$offset]:null;
    }

    protected function checkType($value): void
    {
        if (gettype($value) !== strtolower($this->valueType) && !$value instanceof $this->valueType) {
            throw new \InvalidArgumentException('Value must be of type: ' . $this->valueType . " but value of type: " . gettype($value) . " given.");
        }
    }

    protected function checkOffset($offset): void
    {
        if (!is_null($offset)) {
            throw new \InvalidArgumentException('Offset value can`t be set on a list.');
        }
    }

    protected function addElementToList($offset, $value): void
    {
        $this->elements[] = $value;
    }

    public function offsetSet($offset, $value)
    {
        $this->checkType($value);

        $this->checkOffset($offset);

        $this->addElementToList($offset, $value);
    }

    public function offsetUnset($offset)
    {
        unset($this->elements[$offset]);
    }

    public function count()
    {
        return count($this->elements);
    }
}
