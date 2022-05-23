<?php

namespace App\Http\Livewire;

use Livewire\Component;
use phpDocumentor\Reflection\Types\This;
use Gloudemans\Shoppingcart\Facades\Cart;

class TablaItems extends Component
{
    protected $listeners = ['render'];

    public function destroy(){
        Cart::destroy();
    }

    public function delete($rowID){
        Cart::remove($rowID);
    }


    public function render()
    {
        return view('livewire.tabla-items');
    }
}
