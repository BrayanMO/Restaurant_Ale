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
    public function asd(Table $tables)
    {
        if($tables->status == 1){
            return redirect()->route('/');
        }
        //     $this->order = Order::where('table_id', $tables->id)->first();
        //     return redirect()->route('prueba');
        // }

    }

    public function render()
    {

        return view('livewire.mesas', compact($this->order));
    }
}
