<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::query()->where('user_id', auth()->user()->id);


        if (request('status')) {
            $orders->where('status', request('status'));
        }

        $orders=$orders->get();

        $pendiente = Order::where('status', 1)->where('user_id', auth()->user()->id)->count();
        $preparando = Order::where('status', 2)->where('user_id', auth()->user()->id)->count();
        $enviado = Order::where('status', 3)->where('user_id', auth()->user()->id)->count();
        $pagado = Order::where('status', 4)->where('user_id', auth()->user()->id)->count();
        $anulado = Order::where('status', 5)->where('user_id', auth()->user()->id)->count();

        return view('orders.index', compact('orders', 'pendiente', 'preparando', 'enviado', 'pagado', 'anulado'));
    }
}
