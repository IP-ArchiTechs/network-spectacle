<?php

namespace App\Domain\Router\Enums;

use App\Domain\Router\CommandBuilders\CommandBuilder;
use App\Domain\Router\CommandBuilders\FRRCommandBuilder;

enum Platform: string
{
    case FRR = 'frr';
}
