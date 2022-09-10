<?php

namespace App\Domain\Router\Actions;

use App\Domain\Router\Enums\Command;
use Spatie\Ssh\Ssh;
use Symfony\Component\Process\Process;

class ExecuteCommand
{
    public function __invoke(Command $command, $target): Process
    {
        return Ssh::create('lguser', '45.63.78.25')->execute('traceroute ' . $target);
    }
}
