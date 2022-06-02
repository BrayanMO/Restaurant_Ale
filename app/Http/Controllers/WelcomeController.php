<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Table;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $tables = Table::all();
        
        return view('welcome', compact('tables'));
    }
}
