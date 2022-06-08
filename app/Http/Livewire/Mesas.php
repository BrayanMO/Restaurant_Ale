<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Table;
use Livewire\Component;

class Mesas extends Component
{
    public $table;
    public $order;
    public $mesas = [];


    public function loadPosts()
    {
        $this->mesas = $this->table;

        $this->emit('glider');
    }

    public function render()
    {

        return view('livewire.mesas', compact($this->order));
    }
}
