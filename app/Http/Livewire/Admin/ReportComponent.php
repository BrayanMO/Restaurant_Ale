<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ReportComponent extends Component
{
    use WithPagination;
    public $fecha_inicio, $fecha_fin;
    public $sumtotal;

    public function eliminarfiltro(){
        $this->fecha_inicio ='';
        $this->fecha_fin ='';
    }
    public function render()
    {
        if (!$this->fecha_inicio == '' && !$this->fecha_fin == '') {
            $fi = Carbon::parse($this->fecha_inicio)->format('Y-m-d 00:00:00');
            $ff = Carbon::parse($this->fecha_fin)->format('Y-m-d 23:59:59');
            $orders = Order::where('status','=', 4)
                        ->wherebetween('created_at', [$fi, $ff])
                        ->paginate(10);
            $this->sumtotal = Order::whereBetween('created_at', [$fi, $ff])
                        ->where('status','=', 4)
                        ->sum('total');
        }else{
            $orders = Order::where('status','=', 4)
                        ->paginate(10);
            $this->sumtotal = Order::where('status','=', 4)
                            ->sum('total');
        }
        $sumtotal =$this->sumtotal;

        return view('livewire.admin.report-component', compact('orders', 'sumtotal'))->layout('layouts.admin');
    }
}
