<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=[
            [
                'name' => 'Desayunos',
                'slug' => Str::slug('Desayunos'),
                'icon' => '<i class="fas fa-coffee"></i>'
            ],
            [
                'name' => 'Platos Frios',
                'slug' => Str::slug('Platos Frios'),
                'icon' => '<i class="fas fa-utensils"></i>'
            ],
            [
                'name' => 'Platos Calientes',
                'slug' => Str::slug('Platos Calientes'),
                'icon' => '<i class="fas fa-concierge-bell"></i>'
            ],
            [
                'name' => 'Bebidas',
                'slug' => Str::slug('Bebidas'),
                'icon' => '<i class="fas fa-beer"></i>'
            ]
        ];

        foreach ($categories as $category) {
           Category::create($category);
        }
    }
}
