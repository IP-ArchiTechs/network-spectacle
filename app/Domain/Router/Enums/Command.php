<?php

namespace App\Domain\Router\Enums;

use App\Domain\Router\Models\Target;
use App\Domain\Router\Models\TargetASN;
use App\Domain\Router\Models\TargetIP;

enum Command: string
{
    case Ping = 'Ping';
    case Traceroute = 'Traceroute';
    case ASDetail = 'AS Detail';

    public function buildTarget(string $string): Target
    {
        return match ($this) {
            Command::Ping, Command::Traceroute => TargetIP::fromString($string),
            Command::ASDetail => TargetASN::fromString($string)
        };
    }
}
