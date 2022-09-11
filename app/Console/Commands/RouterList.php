<?php

namespace App\Console\Commands;

use App\Domain\Router\Models\Router;
use Illuminate\Console\Command;

class RouterList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'router:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List configured routers.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $this->table(
            ['ID', 'Name', 'Host', 'Port', 'User', 'Platform'],
            Router::all(['id', 'name', 'host', 'port', 'user', 'platform'])->toArray()
        );

        return 0;
    }
}
