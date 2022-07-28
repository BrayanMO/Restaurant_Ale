<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Table;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class OrderCreate extends Component
{
    use AuthorizesRequests;
    protected $listeners = ['render'];

    public function delete($rowID, Order $order){
        $items = json_decode($order->content);
        foreach ($items as $item) {
            Cart::add([
                'id' => $item->id,
                'name' => $item->name,
                'qty' => $item->qty,
                'price' => $item->price,
                'weight' => 550
            ]);
            if($item->rowId == $rowID){
                Cart::remove($rowID);
                $order->content = Cart::content();
                $order->total = Cart::subtotal();
                $order->status = 1;
                $order->save();
                Cart::destroy();
            }


        }
    }

    public function show(Order $order, Table $mesa){
        $items = json_decode($order->content);
        foreach ($items as $item) {
            Cart::add([
                'id' => rand(5, 15453423),
                'name' => $item->name,
                'qty' => $item->qty,
                'price' => $item->price,
                'weight' => 550
            ]);
        }
        $order->content = Cart::content();
        $order->total = Cart::subtotal();
        $order->status = 1;
        $order->save();
        Cart::destroy();
        $items = json_decode($order->content);
        $this->render();
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
