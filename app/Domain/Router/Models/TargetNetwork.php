<?php

namespace App\Domain\Router\Models;

use App\Exceptions\InvalidNetworkException;
use Exception;
use IPTools\Network;

class TargetNetwork extends Target
{

    public static function fromString(string $string): TargetNetwork
    {
        $target = new self;

        try {
            $target->value = Network::parse($string);
        } catch (Exception) {
            throw new InvalidNetworkException;
        }

        return $target;
    }
}
