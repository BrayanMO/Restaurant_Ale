<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
class UserComponent extends Component
{
    use WithPagination;
    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function assignRole(User $user, $value){

        if($value == '1'){
            $user->removeRole('cocina');
            $user->removeRole('mesero');
            $user->assignRole('admin');
        }elseif($value == '2'){
            $user->removeRole('admin');
            $user->removeRole('mesero');
            $user->assignRole('cocina');
        }elseif($value == '0'){
            $user->removeRole('admin');
            $user->removeRole('cocina');
            $user->assignRole('mesero');
        }else{
            $user->removeRole('mesero');
            $user->removeRole('admin');
            $user->removeRole('cocina');
        }
    }

    public function render()
    {
        $users = User::where('email', '<>', auth()->user()->email)
                    ->where(function($query){
                            $query->where('name', 'LIKE', '%'. $this->search . '%');
                            $query->orwhere('email', 'LIKE', '%'. $this->search . '%');
                    })
                    ->paginate();
        return view('livewire.admin.user-component', compact('users'))->layout('layouts.admin');
    }
}
