<?php

namespace App\Http\Livewire;

use App\Domain\Router\Actions\ExecuteCommandAction;
use App\Domain\Router\DataTransferObjects\CommandRequestData;
use App\Domain\Router\Enums\Command;
use App\Domain\Router\Models\Router;
use App\Exceptions\InvalidASNException;
use App\Exceptions\InvalidIPException;
use App\Exceptions\InvalidNetworkException;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\Rules\Enum;
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

    public function submit(ExecuteCommandAction $executeCommandAction)
    {
        try {

            $this->validate([
                'command' => ['required', new Enum(Command::class)],
                'target' => ['required', 'regex:/[0-9.]/'],
                'selected_router_id' => ['required', 'integer', 'exists:routers,id']
            ]);

            $commandRequestData = CommandRequestData::fromLivewireForm(
                $this->selected_router_id,
                $this->command,
                $this->target
            );

            array_unshift($this->outputs, ($executeCommandAction)($commandRequestData)->getOutput());

        } catch (InvalidIPException) {
            $this->addError('exception', 'That is not a valid IP Address.');
        } catch (InvalidASNException) {
            $this->addError('exception', 'That is not a valid ASN.');
        } catch (InvalidNetworkException) {
            $this->addError('exception', 'That is not a valid network/subnet in CIDR notation');
        }
    }

    public function render(): View
    {
        return view('livewire.looking-glass');
    }
}
