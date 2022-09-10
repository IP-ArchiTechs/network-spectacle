<?php

namespace App\Domain\Router\Models;

use IPTools\IP;

class TargetIP extends Target
{

    public static function fromString(string $string): TargetIP
    {
        $target = new self;
        $target->value = new IP($string);
        return $target;
    }
}
