<?php

namespace App\Http\Livewire;

use App\Domain\Router\Actions\ExecuteCommand;
use App\Domain\Router\Enums\Command;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class LookingGlass extends Component
{
    public array $outputs = [];
    public string|int|null $target = null;
    public Command|string|null $router_action = null;

    public function submit(ExecuteCommand $executeCommand)
    {
        $process = ($executeCommand)(Command::from($this->router_action), $this->target);

        array_unshift($this->outputs, $process->getOutput());
    }

    public function render(): View
    {
        return view('livewire.looking-glass');
    }
}
