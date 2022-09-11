<?php

namespace App\Domain\Router\CommandBuilders;

use App\Domain\Router\Enums\Command;
use App\Domain\Router\Models\Target;
use App\Domain\Router\Models\TargetASN;
use App\Domain\Router\Models\TargetIP;
use App\Domain\Router\Models\TargetNetwork;

abstract class CommandBuilder {

    public function buildCommand(Command $command, Target $target): string
    {
        return match ($command) {
            Command::Ping => $this->ping($target),
            Command::Traceroute => $this->traceroute($target),
            Command::BGPRouteLookup => $this->bgpRouteLookup($target)
        };
    }

    abstract public function ping(TargetIP $targetIP): string;
    abstract public function traceroute(TargetIP $targetIP): string;
    abstract public function bgpRouteLookup(TargetNetwork $targetNetwork): string;
}
