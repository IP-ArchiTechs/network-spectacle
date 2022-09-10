<?php

namespace App\Domain\Router\Models;

class TargetASN extends Target
{

    public static function fromString(string $string): TargetASN
    {
        $target = new self;
        $target->value = (int) $string;

        return $target;
    }
}
