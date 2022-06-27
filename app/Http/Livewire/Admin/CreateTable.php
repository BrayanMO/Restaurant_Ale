<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Table;

class CreateTable extends Component
{
    public $tables, $table;

    protected $listeners = ['delete'];

    public $createForm = [
        'name' => null,
        'slug' => null,
    ];

    public $editForm = [
        'open' => false,
        'name' => null,
        'slug' => null,
    ];

    protected $rules = [
        'createForm.name' => 'required',
        'createForm.slug' => 'required|unique:tables,slug',
    ];

    protected $validationAttributes = [
        'createForm.name' => 'nombre',
        'createForm.slug' => 'slug',
        'editForm.name' => 'nombre',
        'editForm.slug' => 'slug',
    ];

    public function mount()
    {
        $this->getTables();
    }

    public function updatedCreateFormName($value)
    {
        $this->createForm['slug'] = Str::slug($value);
    }

    public function updatedEditFormName($value){
        $this->editForm['slug'] = Str::slug($value);
    }

    public function getTables()
    {
        $this->tables = Table::all();
    }

    public function save()
    {
        $this->validate();

        Table::create([
            'name' => $this->createForm['name'],
            'slug' => $this->createForm['slug'],
        ]);

        $this->reset('createForm');
        $this->getTables();
        $this->emit('saved');
    }

    public function edit(Table $table)
    {
        $this->table = $table;
        $this->resetValidation();

        $this->editForm['open'] = true;
        $this->editForm['name'] = $table->name;
        $this->editForm['slug'] = $table->slug;
    }

    public function update()
    {
        $this->validate([
            'editForm.name' => 'required',
            'editForm.slug' => 'required|unique:tables,slug,' . $this->table->id,
        ]);

        $this->table->update($this->editForm);
        $this->reset('editForm');
        $this->getTables();
    }

    public function delete(Table $table)
    {
        $table->delete();
        $this->getTables();
    }

    public function render()
    {
        return view('livewire.admin.create-table');
    }
}
