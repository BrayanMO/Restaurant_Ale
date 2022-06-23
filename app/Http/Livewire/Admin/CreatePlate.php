<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Plate;
use App\Models\Subcategory;
use Livewire\Component;
use Illuminate\Support\Str;

class CreatePlate extends Component
{
    public $categories, $subcategories = [];
    public $category_id = "", $subcategory_id="";
    public $name, $slug, $price_small, $price_medium, $price_family;

    protected $rules =[
        'category_id' => 'required',
        'subcategory_id' => 'required',
        'name' => 'required',
        'slug' => 'required|unique:plates',
        'price_small' => 'required',
    ];

    public function updatedCategoryID($value){
        $this->subcategories = Subcategory::where('category_id', $value)->get();

        $this->reset('subcategory_id');
        $this->reset('name');
        $this->reset('slug');
        $this->reset('price_small');
        $this->reset('price_medium');
        $this->reset('price_family');
    }

    public function updatedName($value){
        $this->slug = Str::slug($value);
    }

    public function mount(){
        $this->categories = Category::all();
    }

    public function save(){

        $this->validate();

        $plate = new Plate();
        $plate->name = $this->name;
        $plate->slug = $this->slug;
        $plate->price_small = $this->price_small;
        $plate->price_medium = $this->price_medium;
        $plate->price_family = $this->price_family;
        $plate->subcategory_id = $this->subcategory_id;

        $plate->save();

        return redirect()->route('admin.index');
    }
    public function render()
    {
        return view('livewire.admin.create-plate')->layout('layouts.admin');
    }
}
