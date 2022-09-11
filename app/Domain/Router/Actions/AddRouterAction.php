<?php

namespace App\Domain\Router\Actions;

use App\Domain\Router\DataTransferObjects\RouterData;
use App\Domain\Router\Models\Router;

class AddRouterAction
{
    public function __invoke(RouterData $routerData) {
        $router = new Router;
        $router->name = $routerData->name;
        $router->host = $routerData->host;
        $router->port = $routerData->port;
        $router->user = $routerData->user;
        $router->platform = $routerData->platform;
        $router->save();

        return $router;
    }
}
