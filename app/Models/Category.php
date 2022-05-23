<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'icon'];

    // Relacion uno a muchos
    public function subcategories(){
        return $this->hasMany(Subcategory::class);
    }


    public function plates(){
        return $this->hasManyThrough(Plate::class, Subcategory::class);
    }
}
