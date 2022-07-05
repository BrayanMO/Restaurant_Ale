<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admin\ShowPlates;
use App\Http\Livewire\Admin\CreatePlate;
use App\Http\Livewire\Admin\EditPlate;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Livewire\Admin\ShowCategory;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ReportpdfController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Livewire\Admin\ReportComponent;
use App\Http\Livewire\Admin\UserComponent;

Route::get('/', ShowPlates::class)->name('admin.index');

Route::get('plates/create', CreatePlate::class)->name('admin.plates.create');

Route::get('plates/{plate}/edit', EditPlate::class)->name('admin.plates.edit');

Route::get('categories', [CategoryController::class, 'index'])->name('admin.categories.index');

Route::get('categories/{category}', ShowCategory::class)->name('admin.categories.show');

Route::get('tables', [TableController::class, 'index'])->name('admin.tables.index');

Route::get('orders', [OrderController::class, 'index'])->name('admin.orders.index');
Route::get('orders/{order}', [OrderController::class, 'show'])->name('admin.orders.show');

Route::get('users', UserComponent::class)->name('admin.users.index');

Route::get('reports', ReportComponent::class)->name('admin.reports.index');

Route::get('pdf/ventas/',[ReportpdfController::class,'pdfventasall'])->name('admin.pdf.ventasall');

Route::get('pdf/ventas/{fecha_inicio}/{fecha_fin}',[ReportpdfController::class,'pdfventasfecha']);

Route::get('registrarMesero', function(){ return view ('auth.register'); })->name('registrarMesero');



