<?php

namespace App\Http\Livewire;

use Livewire\Component;

class StatusPedido extends Component
{
    public $order, $status;

    public function mount(){
        $this->status = $this->order->status;
    }

    public function update(){
        $this->order->status = $this->status;
        $this->order->save();
        $this->emit('render');
    }

    public function render()
    {
        $items = json_decode($this->order->content);
        return view('livewire.status-pedido', compact('items'))->layout('layouts.app');
    }
}
