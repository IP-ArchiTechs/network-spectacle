<?php

namespace App\Domain\Router\Actions;

use App\Domain\Router\Models\Router;

class DeleteRouterAction
{
    public function __invoke(Router $router): void
    {
        $router->delete();
    }
}
