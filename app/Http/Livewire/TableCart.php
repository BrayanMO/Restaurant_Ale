<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class TableCart extends Component
{
    protected $listeners = ['render'];

    public function destroy(){
        Cart::destroy();
        $this->emit('render');
    }

    public function delete($rowID){
        Cart::remove($rowID);
        $this->emit('render');
    }

    public function render()
    {
        return view('livewire.table-cart');
    }
}
