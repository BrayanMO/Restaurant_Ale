<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Table;
use App\Models\Order;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class OrderCreate extends Component
{
    use AuthorizesRequests;
    protected $listeners = ['render'];
    // public $order;
    public function show(Order $order, Table $mesa){
        $items = json_decode($order->content);
            if ($order->status == '4' || $order->status == '5') {
                $mesa->status = '1';
                $mesa->save();
            }
        return view('livewire.order-create', compact('order', 'mesa', 'items'));
    }

    public function render(){

        return view('livewire.order-create')->layout('layouts.app');
    }
}
