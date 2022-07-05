<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class DropdownPedido extends Component
{
    public function render()
    {
        $order = Order::all()->where('user_id', auth()->user()->id)->whereBetween('created_at', [now()->parse('-5 Hours')->format('Y-m-d 00:00:00'), now()->parse('-5 Hours')->format('Y-m-d 23:59:59')]);
        return view('livewire.dropdown-pedido', compact('order'));
    }
}
