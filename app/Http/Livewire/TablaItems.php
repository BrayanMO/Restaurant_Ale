<?php

namespace App\Http\Livewire;

use App\Models\Table;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;

class TablaItems extends Component
{
    protected $listeners = ['render'];
    public Table $mesa;

    public function destroy(){
        Cart::destroy();
    }

    public function delete($rowID){
        Cart::remove($rowID);
    }


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
        $this->emit('render');
        return redirect()->route('orders.create', [$order, $this->mesa]);
    }

    public function render()
    {
        return view('livewire.tabla-items');
    }
}
