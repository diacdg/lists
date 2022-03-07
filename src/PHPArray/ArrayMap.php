<?php

namespace Diacdg\PHPArray;

class ArrayMap extends AbstractArray
{
    protected $offsetType;
    
    public function __construct(string $offsetType, string $valueType)
    {
        $offsetAcceptedTypes = ['integer', 'string'];
        if (!in_array(strtolower($offsetType), $offsetAcceptedTypes)) {
            throw new \InvalidArgumentException('Offest type must be of type: ' . implode(', ', $offsetAcceptedTypes) . '.');
        }

        parent::__construct($valueType);
        $this->offsetType = $offsetType;
    }

    protected function checkOffset($offset): void
    {
        if (gettype($offset) !== strtolower($this->offsetType)) {
            throw new \InvalidArgumentException('Offest must be of type: ' . $this->offsetType . '.');
        }
    }
}
