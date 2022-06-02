<?php

namespace App\Http\Controllers;
use App\Http\Livewire\Search;
use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;

class MesaController extends Controller
{

    public function check(Table $mesa, Order $order){
        if ($mesa->status == '1') {
            return view('mesas.show', compact('mesa'));
        }
        elseif($mesa->status == '2') {
            return view('livewire.order-create', compact('mesa', 'order'));
        }
        // }else{
        //     return "Reservado";
        //
    }

}
