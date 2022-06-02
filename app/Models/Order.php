<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at', 'status'];

    const PENDIENTE = 1;
    const ENTREGADO = 2;
    const PAGADO = 3;
    const ANULADO = 4;

    // uno a muchos inversa
    public function table(){
        return $this->belongsTo(Table::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
