<?php

namespace App\Domain\Router\DataTransferObjects;

use App\Domain\Router\Enums\Platform;
use App\Exceptions\InvalidIPException;
use Exception;
use IPTools\IP;

class RouterData
{
    public string $name;
    public IP $host;
    public int $port;
    public string $user;
    public Platform $platform;

    public static function fromArtisanCommand(array $fields): RouterData
    {
        $dto = new self;
        $dto->name = $fields['name'];
        try {
            $dto->host = new IP($fields['host']);
        } catch (Exception $exception) {
            throw new InvalidIPException;
        }
        $dto->port = $fields['port'];
        $dto->user = $fields['user'];
        $dto->platform = Platform::from($fields['platform']);
        return $dto;
    }
}
