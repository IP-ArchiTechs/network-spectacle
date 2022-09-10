<?php

namespace App\Http\Livewire;

use App\Domain\Router\Actions\ExecuteCommand;
use App\Domain\Router\DataTransferObjects\CommandRequestData;
use App\Domain\Router\Enums\Command;
use App\Domain\Router\Models\Router;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class LookingGlass extends Component
{
    public array $outputs = [];
    public array $commands = [];
    public ?string $target = null;
    public ?string $command = null;
    public ?int $selected_router_id = null;
    public Collection $routers;

    public function mount() {
        $this->routers = Router::all();
        $this->commands = array_column(Command::cases(), 'value');
    }

    public function submit(ExecuteCommand $executeCommand)
    {
        try {

            $commandRequestData = CommandRequestData::fromLivewireForm(
                $this->selected_router_id,
                $this->command,
                $this->target
            );

            array_unshift($this->outputs, ($executeCommand)($commandRequestData)->getOutput());

        } catch (\ValueError $exception) {
            $this->addError('command', 'I do not understand how to do that.');
        }
    }

    public function render(): View
    {
        return view('livewire.looking-glass');
    }
}
