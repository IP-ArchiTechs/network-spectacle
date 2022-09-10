<?php

namespace App\Domain\Router\Models;

use App\Exceptions\InvalidASNException;

class TargetASN extends Target
{

    public static function fromString(string $string): TargetASN
    {
        if (!filter_var($string, FILTER_VALIDATE_INT)) {
            throw new InvalidASNException;
        }

        $target = new self;
        $target->value = (int) $string;

        return $target;
    }
}
