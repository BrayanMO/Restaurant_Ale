<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

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
       if (Request::segment(1) == 'admin' || Request::segment(3) == 'admin.show-plates' || Request::segment(3) == 'admin.edit-plate') {
           return 'slug';
       }else{
           return 'id';
       }
    }

}
