<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Test extends Component
{
    public $name;

    public function mount()
    {
        $this->name = 'Ledda Joshua';
    }

    public function render()
    {
        return view('livewire.test', [
            'name' => $this->name,
        ]);
    }
}
