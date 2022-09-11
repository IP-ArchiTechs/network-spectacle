<?php

namespace App\Domain\Router\Models;

use IPTools\IP;
use IPTools\Network;

abstract class Target
{
    public IP|Network|int $value;

    abstract public static function fromString(string $string);
}
