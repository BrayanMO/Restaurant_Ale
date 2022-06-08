<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at', 'status'];

    const RECIBIDO = 1;
    const PREPARANDO = 2;
    const ENVIADO = 3;
    const PAGADO = 4;
    const ANULADO = 5;

    // uno a muchos inversa
    public function table(){
        return $this->belongsTo(Table::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
