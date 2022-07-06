<?php

namespace App\Http\Controllers;

class Loginer extends Controller
{
    public function index(){
        return view('auth.register');
    }
}
