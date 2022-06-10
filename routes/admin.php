<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admin\ShowPlates;
use App\Http\Livewire\Admin\CreatePlate;

Route::get('/', ShowPlates::class)->name('admin.index');

Route::get('plates/create', CreatePlate::class)->name('admin.plates.create');

Route::get('plates/{plate}/edit', function(){})->name('admin.plates.edit');



