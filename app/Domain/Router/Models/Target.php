<?php

namespace App\Domain\Router\Models;

use IPTools\IP;

abstract class Target
{
    public IP|int $value;

    abstract public static function fromString(string $string);
}
