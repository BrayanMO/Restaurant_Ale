<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Category;
use App\Models\Plate;
use App\Models\Subcategory;


class Navigation extends Component
{
    public function render()
    {

        $categories = Category::all();
        $subcategories = Subcategory::all();

        return view('livewire.navigation', compact('categories', 'subcategories'));
    }
}
