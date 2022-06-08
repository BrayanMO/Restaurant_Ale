<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admin\ShowPlates;

route::get('/', ShowPlates::class)->name('admin.index');

