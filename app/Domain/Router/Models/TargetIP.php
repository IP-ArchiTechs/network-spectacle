<?php

namespace App\Domain\Router\Models;

use App\Exceptions\InvalidIPException;
use IPTools\IP;

class TargetIP extends Target
{

    public static function fromString(string $string): TargetIP
    {
        try {
            $target = new self;
            $target->value = new IP($string);
        } catch (\Exception) {
            throw new InvalidIPException;
        }
        return $target;
    }
}
