<?php

namespace App\Http\Controllers;
use App\Http\Livewire\Search;
use Illuminate\Http\Request;
use App\Models\Plate;
use App\Models\Table;

class MesaController extends Controller
{

    protected $listeners = ['show'];

    public function show(Table $mesa){
        return view('mesas.show', compact('mesa'));
    }
}
