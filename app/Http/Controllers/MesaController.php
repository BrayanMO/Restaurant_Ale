<?php

namespace App\Http\Controllers;
use App\Http\Livewire\Search;
use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;

class MesaController extends Controller
{

    public function check(Order $order, Table $mesa){
        if ($mesa->status == '1') {

            return view('Mesas.show', compact('mesa'));
        }
        elseif($mesa->status == '2'){
            $order = Order::where('table_id', $mesa->id)->orderBy('id', 'desc')->first();
                            // ->where('status', '<>',4 || '<>', 5);
            return redirect()->route('orders.create', [$order, $mesa]);
        }else{
            return "Hola";
        }
        // }else{
        //     return "Reservado";
        //
    }


}
