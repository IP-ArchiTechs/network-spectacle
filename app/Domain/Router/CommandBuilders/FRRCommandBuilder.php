<?php

namespace App\Domain\Router\CommandBuilders;

use App\Domain\Router\Models\TargetIP;
use App\Domain\Router\Models\TargetNetwork;

class FRRCommandBuilder extends CommandBuilder
{

    public function ping(TargetIP $targetIP): string
    {
        $ip = (string) $targetIP->value;

        return match ($targetIP->value->getVersion()) {
          'IPv4' => 'ping -c 4 ' . $ip,
          'IPv6' => 'ping6 -c 4 ' . $ip
        };
    }

    public function traceroute(TargetIP $targetIP): string
    {
        $ip = (string) $targetIP->value;

        return match ($targetIP->value->getVersion()) {
            'IPv4' => 'traceroute ' . $ip,
            'IPv6' => 'traceroute6 ' . $ip
        };
    }

    public function bgpRouteLookup(TargetNetwork $targetNetwork): string
    {
        return match ($targetNetwork->value->getFirstIP()->getVersion()) {
            'IPv4' => 'vtysh -c "show ip bgp ' . $targetNetwork->value . '"',
            'IPv6' => 'vtysh -c "show bgp ipv6 unicast ' . $targetNetwork->value . '"'
        };
    }
}
