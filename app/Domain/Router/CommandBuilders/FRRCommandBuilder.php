<?php

namespace App\Domain\Router\CommandBuilders;

use App\Domain\Router\Models\TargetIP;

class FRRCommandBuilder extends CommandBuilder
{

    public function ping(TargetIP $targetIP): string
    {
        $ip = (string) $targetIP->value;

        return 'ping -c 4 ' . $ip;
    }

    public function traceroute(TargetIP $targetIP): string
    {
        $ip = (string) $targetIP->value;

        return 'traceroute ' . $ip;
    }
}
