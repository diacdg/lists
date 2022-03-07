<?php
declare(strict_types=1);

namespace Diacdg\PHPArray;

abstract class AbstractArray extends \ArrayObject
{
    protected $valueType;

    public function __construct(string $valueType, array $array = [], int $flags = 0, string $iteratorClass = "ArrayIterator") {
        $this->valueType = $valueType;

        $this->checkAllElements($array);

        parent::__construct($array, $flags, $iteratorClass);
    }

    public function offsetSet($offset, $value)
    {
        $this->checkType($value);

        $this->checkOffset($offset);

        parent::offsetSet($offset, $value);
    }

    public function exchangeArray($array)
    {
        $this->checkAllElements($array);

        parent::exchangeArray($array);
    }

    protected function checkType($value): void
    {
        if (gettype($value) !== strtolower($this->valueType) && !$value instanceof $this->valueType) {
            throw new \InvalidArgumentException('Value must be of type: ' . $this->valueType . " but value of type: " . gettype($value) . " given.");
        }
    }

    abstract protected function checkOffset($offset): void;

    private function checkAllElements(array $array): void
    {
        array_walk($array, function ($value, $offset) {
            $this->checkOffset($offset);
            $this->checkType($value);
        });
    }
}