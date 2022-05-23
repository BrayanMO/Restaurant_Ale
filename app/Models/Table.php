<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
    const DISPONIBLE = 1;
    const OCUPADO = 2;
    const RESERVADO = 3;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // URL AMIGABLES
    public function getRouteKeyName()
    {
        return 'slug';
    }

}
