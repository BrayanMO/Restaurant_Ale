<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class DropdownPedido extends Component
{
    public function render()
    {
        $order = Order::all()->where('user_id', auth()->user()->id);
        return view('livewire.dropdown-pedido', compact('order'));
    }
}
