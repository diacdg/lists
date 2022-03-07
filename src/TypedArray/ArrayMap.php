<?php

namespace Diacdg\TypedArray;

class ArrayMap extends AbstractTypedArray
{
    protected $offsetType;
    
    public function __construct(string $offsetType, string $valueType, array $array = [], int $flags = 0, string $iteratorClass = "ArrayIterator")
    {
        $this->offsetType = $offsetType;
        $offsetAcceptedTypes = ['integer', 'string'];
        if (!in_array(strtolower($offsetType), $offsetAcceptedTypes)) {
            throw new \InvalidArgumentException('Offest type must be of type: ' . implode(', ', $offsetAcceptedTypes) . '.');
        }

        parent::__construct($valueType, $array, $flags, $iteratorClass);
    }

    protected function checkOffset($offset): void
    {
        if (gettype($offset) !== strtolower($this->offsetType)) {
            throw new \InvalidArgumentException('Offest must be of type: ' . $this->offsetType . '.');
        }
    }
}