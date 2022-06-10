<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Lang;
use Livewire\Component;
use App\Models\Plate;
use Livewire\WithPagination;

class ShowPlates extends Component
{
    use WithPagination;
    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        $plates = Plate::where('name', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.admin.show-plates', compact('plates'))->layout('layouts.admin');
    }
}
