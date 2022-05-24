<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class AddPlateCant extends Component
{

    public $rowId;

    public $qty = 1;

    protected $listeners = ['render'];

    public function mount()
    {
       $item = Cart::get($this->rowId);
       $this->qty = $item->qty;
    }


    public function decrement(){
        $this->qty = $this->qty - 1;

        Cart::update($this->rowId, $this->qty);
        $this->emit('render');
    }

    public function increment(){
        $this->qty = $this->qty + 1;

        Cart::update($this->rowId, $this->qty);
        $this->emit('render');
    }

    public function render()
    {
        return view('livewire.add-plate-cant');
    }
}
