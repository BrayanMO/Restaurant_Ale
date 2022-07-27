<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Table;

class CreateItems extends Component
{
    public Table $mesa;
    
    protected $listeners = ['render'];

    public function create_order(){

        $order = new Order();

        $order->user_id = auth()->user()->id;
        $order->total = Cart::subtotal();
        $order->content = Cart::content();
        $order->table_id = $this->mesa->id;
        $order->created_at = now()->modify('-5 hours');

        $this->mesa->status = 2;
        $this->mesa->save();
        $order->save();
        Cart::destroy();
        $this->emitTo('OrderCreate', 'show');
        return redirect()->route('orders.create', [$order, $this->mesa]);
    }

    public function render()
    {

        return view('livewire.create-items');
    }
}
