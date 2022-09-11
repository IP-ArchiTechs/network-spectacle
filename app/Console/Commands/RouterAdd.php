<?php

namespace App\Console\Commands;

use App\Domain\Router\Actions\AddRouterAction;
use App\Domain\Router\DataTransferObjects\RouterData;
use App\Domain\Router\Enums\Platform;
use App\Domain\Router\Models\Router;
use App\Exceptions\InvalidIPException;
use Illuminate\Console\Command;
use Illuminate\Validation\Rules\Enum;

class RouterAdd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'router:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a router to perform commands on.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(AddRouterAction $addRouterAction): int
    {
        try {
            $fields = [];

            $fields['name'] = $this->ask('What is the publicly facing name of this router? (Example: nyc-1.company.com)');
            $fields['host'] = $this->ask('What is the IP to reach this router on from THIS app server?');
            $fields['port'] = $this->ask('What port should be used for SSH?', 22);
            $fields['user'] = $this->ask('What username should be used for SSH?');
            $fields['platform'] = $this->choice('What platform is this router running on?', array_column(Platform::cases(), 'value'));

            $validator = \Validator::make($fields, [
                'name' => ['required', 'string'],
                'host' => ['required', 'ip'],
                'port' => ['required', 'int'],
                'user' => ['required', 'string'],
                'platform' => ['required', new Enum(Platform::class)]
            ]);

            if ($validator->fails()) {
                foreach ($validator->errors() as $error) {
                    $this->error($error);
                }

                return 1;
            }

            $routerData = RouterData::fromArtisanCommand($fields);

            ($addRouterAction)($routerData);
        } catch (InvalidIPException $exception) {
            $this->error('The host you entered was not a valid IP address.');

            return 1;
        }
        return 0;
    }
}
