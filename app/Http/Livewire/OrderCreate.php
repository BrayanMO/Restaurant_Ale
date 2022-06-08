<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Table;
use App\Models\Order;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class OrderCreate extends Component
{
    use AuthorizesRequests;
    // public $order;
    public function show(Order $order, Table $mesa){
        $items = json_decode($order->content);
        return view('livewire.order-create', compact('order', 'mesa', 'items'));


    }

    public function render(){
        return view('livewire.order-create')->layout('layouts.app');
    }
}
