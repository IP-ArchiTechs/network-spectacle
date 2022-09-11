<?php

namespace App\Domain\Router\Enums;

use App\Domain\Router\Models\Target;
use App\Domain\Router\Models\TargetASN;
use App\Domain\Router\Models\TargetIP;
use App\Domain\Router\Models\TargetNetwork;

enum Command: string
{
    case Ping = 'Ping';
    case Traceroute = 'Traceroute';
    case BGPRouteLookup = 'BGP Router Lookup';

    public function buildTarget(string $string): Target
    {
        return match ($this) {
            Command::Ping, Command::Traceroute => TargetIP::fromString($string),
            Command::BGPRouteLookup => TargetNetwork::fromString($string)
        };
    }
}
