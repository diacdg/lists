<?php

namespace Diacdg\PHPArray;

class ArrayList extends AbstractArray
{
    protected function checkOffset($offset): void
    {
        if (!is_null($offset) && !is_int($offset)) {
            throw new \InvalidArgumentException('Offset value must be of type int.');
        }
    }
}
