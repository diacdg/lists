<?php

namespace Diacdg\TypedArray;

class ArrayList extends AbstractTypedArray
{
    protected function checkOffset($offset): void
    {
        if (!is_null($offset) && !is_int($offset)) {
            throw new \InvalidArgumentException('Offset value must be of type int.');
        }
    }
}