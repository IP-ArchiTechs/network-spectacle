<?php

namespace App\Domain\Router\DataTransferObjects;

use App\Domain\Router\Enums\Command;
use App\Domain\Router\Models\Router;
use App\Domain\Router\Models\Target;

class CommandRequestData
{
    public Router $router;
    public Command $command;
    public Target $target;

    public static function fromLivewireForm(int $router_id, string $command, string $target): CommandRequestData
    {
        $dto = new self;
        $dto->router = Router::findOrFail($router_id);
        $dto->command = Command::from($command);
        $dto->target = $dto->command->buildTarget($target);

        return $dto;
    }
}
