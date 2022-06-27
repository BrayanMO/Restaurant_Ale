<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        $orders = Order::query()->whereBetween('created_at', [now()->parse('-1 day', '+19 Hours')->format('Y-m-d 00:00:00'), now()->parse('-1 day', '+19 Hours')->format('Y-m-d 23:59:59')]);


        if (request('status')) {
            $orders->where('status', request('status'));
        }

        $orders=$orders->get();

        $pendiente = Order::where('status', 1)->whereBetween('created_at', [now()->parse('-1 day', '+19 Hours')->format('Y-m-d 00:00:00'), now()->parse('-1 day', '+19 Hours')->format('Y-m-d 23:59:59')])->count();
        $preparando = Order::where('status', 2)->whereBetween('created_at', [now()->parse('-1 day', '+19 Hours')->format('Y-m-d 00:00:00'), now()->parse('-1 day', '+19 Hours')->format('Y-m-d 23:59:59')])->count();
        $enviado = Order::where('status', 3)->whereBetween('created_at', [now()->parse('-1 day', '+19 Hours')->format('Y-m-d 00:00:00'), now()->parse('-1 day', '+19 Hours')->format('Y-m-d 23:59:59')])->count();


        return view('pedido.index', compact('orders', 'pendiente', 'preparando', 'enviado'));
    }

    public function show(Order $order)
    {
        return view('pedido.show', compact('order'));
    }
}
