<?php

namespace App\Domain\Router\Enums;

enum Command: string
{
    case Ping = 'ping';
    case Traceroute = 'traceroute';
}
