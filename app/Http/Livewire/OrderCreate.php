<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Table;
use App\Models\Order;

class OrderCreate extends Component
{
    public $order;
    public function show(Order $order, Table $mesa){
        $items = json_decode($order->content);
        return view('livewire.order-create', compact('order', 'mesa', 'items'));
    }

    public function render(){

        return view('livewire.order-create');
    }
}
