<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Mesas extends Component
{
    public $table;

    public $mesas = [];

    public function loadPosts(){
        $this->mesas = $this->table;

        $this->emit('glider');
    }

    public function render()
    {
        return view('livewire.mesas');
    }
}
