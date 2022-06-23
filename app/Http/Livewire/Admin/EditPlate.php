<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Plate;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;

class EditPlate extends Component
{
    public $plate, $categories, $subcategories, $slug;

    public $category_id;

    protected $rules =[
        'category_id' => 'required',
        'plate.subcategory_id' => 'required',
        'plate.name' => 'required',
        'slug' => 'required|unique:plates,slug',
        'plate.price_small' => 'required',
        'plate.price_medium' => '',
        'plate.price_family' => '',
    ];

    protected $listeners=['delete'];

    public function mount(Plate  $plate){
        $this->plate = $plate;

        $this->categories = Category::all();

        $this->category_id = $plate->subcategory->category->id;

        $this->subcategories = Subcategory::where('category_id', $this->category_id)->get();

        $this->slug = $this->plate->slug;
    }

    public function updatedPlateName($value){
        $this->slug = Str::slug($value);
    }

    public function updatedCategoryID($value){
        $this->subcategories = Subcategory::where('category_id', $value)->get();

        $this->plate->subcategory_id = "";
        if($this->plate->subcategory->category->id == 4){
            $this->plate->price_medium = "";
            $this->plate->price_family = "";
        }
    }

    public function save(){
        $rules = $this->rules;

        $rules['slug'] = 'required|unique:plates,slug,' . $this->plate->id;


        $this->validate($rules);
        $this->plate->slug = $this->slug;
        $this->plate->save();

        $this->emit('saved');
        // return redirect()->route('admin.index');
    }

    public function delete(){
        $this->plate->delete();

        return redirect()->route('admin.index');
    }

    public function render()
    {
        return view('livewire.admin.edit-plate')->layout('layouts.admin');
    }
}
