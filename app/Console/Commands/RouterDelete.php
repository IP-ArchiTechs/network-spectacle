<?php

namespace App\Console\Commands;

use App\Domain\Router\Actions\DeleteRouterAction;
use App\Domain\Router\Models\Router;
use Illuminate\Console\Command;

class RouterDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'router:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete a router.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(DeleteRouterAction $deleteRouterAction): int
    {
        $this->call('router:list');

        $routerId = $this->ask('Enter ID of router you would like to delete');
        $router = Router::findOrFail($routerId);
        if ($this->confirm('Do you want to delete ' . $router->name . ' (' . $router->host . ')?')) {
            ($deleteRouterAction)($router);
            $this->info('Router deleted successfully.');
        }

        return 0;
    }
}
