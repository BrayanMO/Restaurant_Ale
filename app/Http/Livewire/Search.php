<?php

namespace App\Http\Livewire;
// use App\Http\Controllers\MesaController;
use App\Models\Plate;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class Search extends Component
{

    public $search;
    public $select_price = 1;
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
        // && $this->id->subcategory->category->id == 4
        if ($this->select_price == 1 || $id->subcategory->category->id == 4 ) {
                Cart::add([
                    'id' => rand(5, 15453423),
                    'name' => $id->name,
                    'qty' => 1,
                    'price' => $id->price_small,
                    'weight' => 550
                ]);
        } elseif($this->select_price == 2) {
            if ($id->price_medium == null){
                Cart::add([
                    'id' => rand(5, 15453423),
                    'name' => $id->name,
                    'qty' => 1,
                    'price' => $id->price_small,
                    'weight' => 550
                ]);
            }else{
                Cart::add([
                    'id' => rand(5, 23423423),
                    'name' => $id->name,
                    'qty' => 1,
                    'price' => $id->price_medium,
                    'weight' => 550
                ]);
            }

        }elseif($this->select_price == 3){
            if ($id->price_family == null){
                Cart::add([
                    'id' => rand(5, 15453423),
                    'name' => $id->name,
                    'qty' => 1,
                    'price' => $id->price_small,
                    'weight' => 550
                ]);
            }else{
                Cart::add([
                    'id' => rand(5, 23423423),
                    'name' => $id->name,
                    'qty' => 1,
                    'price' => $id->price_family,
                    'weight' => 550
                ]);
            }
        }
        $this->emitTo('add-plate-cant', 'render');
        $this->emitTo('tabla-items', 'render');
        $this->emit('render');
        $this->open = false;
        $this->search = '';
        $this->select_price = 1;
    }

    public function render()
    {
        if ($this->search) {
            $plates = Plate::where('name', 'LIKE', '%' . $this->search . '%')
                ->where('status', 2)
                ->take(4)
                ->get();
        } else {
            $plates = [];
        }
        // docentes = nombre, apellido, sexo, dni, aula, rol(admin-docente-alumno)
        // select  * from docentes where dni = @user where password = @pass where estado = 1
        // if(user->role == admin){
        return view('livewire.search', compact('plates'));
    }
}
