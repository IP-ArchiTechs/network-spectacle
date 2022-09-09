<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Ssh\Ssh;

class RouterOutput extends Component
{
    public $output = "";
    public $target = null;

    public function submit()
    {
        $process = Ssh::create('lguser', '45.63.78.25')->execute('traceroute ' . $this->target);

        $this->output = $process->getOutput();
    }

    public function render()
    {
        return view('livewire.router-output');
    }
}
