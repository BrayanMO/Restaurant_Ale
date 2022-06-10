<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    use HasFactory;
    const BORRADOR = 1;
    const PUBLICADO = 2;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Relacion uno a muchos inversa
    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
