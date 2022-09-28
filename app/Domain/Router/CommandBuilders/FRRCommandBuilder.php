<?php

namespace App\Domain\Router\CommandBuilders;

use App\Domain\Router\Models\Target;
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

    public function bgpRouteLookup(Target $target): string
    {

        if (is_a($target, TargetIP::class)) {
            return match ($target->value->getVersion()) {
                'IPv4' => 'vtysh -c "show ip bgp ipv4 ' . $target->value . '"',
                'IPv6' => 'vtysh -c "show bgp ipv6 unicast ' . $target->value . '"'
            };
        }

        if (is_a($target, TargetNetwork::class)) {
            return match ($target->value->getFirstIP()->getVersion()) {
                'IPv4' => 'vtysh -c "show ip bgp ipv4 ' . $target->value . '"',
                'IPv6' => 'vtysh -c "show bgp ipv6 unicast ' . $target->value . '"'
            };
        }

        return "";
    }
}
