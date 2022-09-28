<?php

namespace App\Domain\Router\Enums;

use App\Domain\Router\Models\Target;
use App\Domain\Router\Models\TargetIP;
use App\Domain\Router\Models\TargetNetwork;

enum Command: string
{
    case Ping = 'Ping';
    case Traceroute = 'Traceroute';
    case BGPRouteLookup = 'BGP Route Lookup';

    public function buildTarget(string $string): Target
    {
        return match ($this) {
            Command::Ping, Command::Traceroute => TargetIP::fromString($string),
            Command::BGPRouteLookup => Target::fromString($string)
        };
    }
}
