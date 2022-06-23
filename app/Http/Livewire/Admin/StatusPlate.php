<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class StatusPlate extends Component
{

    public $plate, $status;

    public function mount(){
        $this->status = $this->plate->status;
    }

    public function save(){
        $this->plate->status = $this->status;
        $this->plate->save();

        $this->emit('saved');
    }
    public function render()
    {
        return view('livewire.admin.status-plate');
    }
}
