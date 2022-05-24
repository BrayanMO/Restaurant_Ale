<?php

namespace App\Http\Controllers;
use App\Http\Livewire\Search;
use Illuminate\Http\Request;
use App\Models\Plate;
use App\Models\Table;

class MesaController extends Controller
{

    public function show(Table $mesa){
        if ($mesa->status == '1') {
            return view('mesas.show', compact('mesa'));
        }elseif($mesa->status == '2') {
            return "ocupado";
        }else{
            return "Reservado";
        }

        // return view('mesas.show', compact('mesa'));
    }
}
