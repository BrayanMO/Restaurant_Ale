<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;

class ReportpdfController extends Controller
{
    public function pdfventasall(){
        $fecha_inicio=null;
        $fecha_fin=null;
        $orders = Order::where('status','=', 4)->whereBetween('created_at', [now()->parse('-5 Hours')->format('Y-m-d 00:00:00'), now()->parse('-5 Hours')->format('Y-m-d 23:59:59')])
                ->get();
        $sumtotal = Order::where('status','=', 4)
                ->get()
                ->sum('total');
        $pdf = PDF::loadView('pdf.ventas', compact('orders', 'fecha_inicio', 'fecha_fin','sumtotal'));

        return $pdf->stream('pdfventas.pdf');
    }
    public function pdfventasfecha($fecha_inicio, $fecha_fin)
    {
        $fi = Carbon::parse($fecha_inicio)->format('Y-m-d 00:00:00');
            $ff = Carbon::parse($fecha_fin)->format('Y-m-d 23:59:59');
            $orders = Order::where('status','=', 4)
                        ->wherebetween('created_at', [$fi, $ff])
                        ->paginate(10);
            $sumtotal = Order::whereBetween('created_at', [$fi, $ff])
                        ->where('status','=', 4)
                        ->sum('total');
        $pdf = PDF::loadView('pdf.ventas', compact('orders', 'fecha_inicio', 'fecha_fin','sumtotal'));
        return $pdf->stream('pdfventas.pdf');
    }

}
