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



    public function render()
    {
        return view('livewire.tabla-items');
    }
}
