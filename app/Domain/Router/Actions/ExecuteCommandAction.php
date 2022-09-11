<?php

namespace App\Domain\Router\Actions;

use App\Domain\Router\DataTransferObjects\CommandRequestData;
use Spatie\Ssh\Ssh;
use Symfony\Component\Process\Process;

class ExecuteCommandAction
{
    public function __invoke(CommandRequestData $commandRequestData): Process
    {
        $commandString = $commandRequestData
            ->router->buildCommand($commandRequestData->command, $commandRequestData->target);

        return Ssh::create(
            $commandRequestData->router->user,
            $commandRequestData->router->host)
            ->execute($commandString);
    }
}
