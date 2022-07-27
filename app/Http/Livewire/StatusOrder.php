<?php

namespace App\Http\Livewire;
use App\Models\Table;
use Livewire\Component;

class StatusOrder extends Component
{
    public $order, $status, $tables;

    public function mount(){
        $this->status = $this->order->status;
    }

    public function update(){
        $tables = Table::all();
        $this->order->status = $this->status;
            foreach ($tables as $key => $value) {
                if ($value->id == $this->order->table_id) {
                    if ($this->order->status == 4 || $this->order->status == 5) {
                        $value->status = 1;
                        $value->save();
                    }
                }
            }
        $this->order->save();

        $this->emit('render');

    }

    public function render()
    {
        $items = json_decode($this->order->content);
        return view('livewire.status-order' , compact('items'));
    }
}
