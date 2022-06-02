<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use Illuminate\Auth\Events\Login;
use App\Http\Controllers\MesaController;
use App\Http\Livewire\OrderCreate;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::post({{ 'login' }});
Route::middleware(['auth'])->group(function(){
Route::get('/', WelcomeController::class);

Route::get('mesas/{mesa}', [MesaController::class, 'check'])->name('mesas.show');

// Route::get('orders/{mesa}', [CreateOrder::class, 'show'])->name('orders.create');

Route::get('orders/{order}/{mesa}', [OrderCreate::class, 'show'])->name('orders.create');

});


Route::get('prueba', function () {
   return  \Cart::content();
})->name('prueba');







