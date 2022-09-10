<?php

namespace App\Domain\Router\Models;

use App\Domain\Router\CommandBuilders\CommandBuilder;
use App\Domain\Router\CommandBuilders\FRRCommandBuilder;
use App\Domain\Router\Enums\Command;
use App\Domain\Router\Enums\Platform;
use Illuminate\Database\Eloquent\Model;

class Router extends Model
{
    protected $casts = [
        'platform' => Platform::class
    ];

    public function buildCommand(Command $command, Target $target) {
        return $this->getCommandBuilder()->buildCommand($command, $target);
    }

    public function getCommandBuilder(): CommandBuilder
    {
        return match ($this->platform) {
            Platform::FRR => new FRRCommandBuilder()
        };
    }
}
