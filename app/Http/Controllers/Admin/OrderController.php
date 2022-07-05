<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::query()->whereBetween('created_at', [now()->parse('-5 Hours')->format('Y-m-d 00:00:00'), now()->parse('-5 Hours')->format('Y-m-d 23:59:59')]);


        if (request('status')) {
            $orders->where('status', request('status'));
        }

        $orders=$orders->get();

        $pendiente = Order::where('status', 1)->whereBetween('created_at', [now()->parse('-5 Hours')->format('Y-m-d 00:00:00'), now()->parse('-5 Hours')->format('Y-m-d 23:59:59')])->count();
        $preparando = Order::where('status', 2)->whereBetween('created_at', [now()->parse('-5 Hours')->format('Y-m-d 00:00:00'), now()->parse('-5 Hours')->format('Y-m-d 23:59:59')])->count();
        $enviado = Order::where('status', 3)->whereBetween('created_at', [now()->parse('-5 Hours')->format('Y-m-d 00:00:00'), now()->parse('-5 Hours')->format('Y-m-d 23:59:59')])->count();
        $pagado = Order::where('status', 4)->whereBetween('created_at', [now()->parse('-5 Hours')->format('Y-m-d 00:00:00'), now()->parse('-5 Hours')->format('Y-m-d 23:59:59')])->count();
        $anulado = Order::where('status', 5)->whereBetween('created_at', [now()->parse('-5 Hours')->format('Y-m-d 00:00:00'), now()->parse('-5 Hours')->format('Y-m-d 23:59:59')])->count();

        return view('Admin.orders.index', compact('orders', 'pendiente', 'preparando', 'enviado', 'pagado', 'anulado'));
    }

    public function show(Order $order)
    {
        return view('Admin.orders.show', compact('order'));
    }

}
