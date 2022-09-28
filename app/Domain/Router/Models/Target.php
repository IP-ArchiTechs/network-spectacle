<?php

namespace App\Domain\Router\Models;

use IPTools\IP;
use IPTools\Network;

abstract class Target
{
    public IP|Network|int $value;

    public static function fromString(string $string): Target {
        if (str_contains($string, '/')) {
            return TargetNetwork::fromString($string);
        } else {
            return TargetIP::fromString($string);
        }
    }
}
