<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Lang;
use Livewire\Component;

class ShowPlates extends Component
{
    public function render()
    {
        return view('livewire.admin.show-plates')->layout('layouts.admin');
    }
}
