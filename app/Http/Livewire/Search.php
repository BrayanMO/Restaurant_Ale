<?php

namespace App\Http\Livewire;
// use App\Http\Controllers\MesaController;
use App\Models\Plate;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class Search extends Component
{

    public $search;
    public $select_price;
    public $open = false;
    public function updatedSearch($value)
    {
        if ($value) {
            $this->open = true;
        } else {
            $this->open = false;
        }
    }

    public function addItem(Plate $id)
    {
        Cart::add([
            'id' => $id->id,
            'name' => $id->name,
            'qty' => 1,
            'price' => $id->price_small,
            'weight' => 550
        ]);
        $this->emit('render');
        $this->open = false;
        $this->search = '';
    }

    public function render()
    {
        if ($this->search) {
            $plates = Plate::where('name', 'LIKE', '%' . $this->search . '%')
                ->where('status', 2)
                ->take(8)
                ->get();
        } else {
            $plates = [];
        }
        return view('livewire.search', compact('plates'));
    }
}
