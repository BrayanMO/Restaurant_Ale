<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class PedidoMobil extends Component
{
    public function render()
    {
        $order = Order::all()->where('user_id', auth()->user()->id);
        return view('livewire.pedido-mobil', compact('order'));
    }
}
