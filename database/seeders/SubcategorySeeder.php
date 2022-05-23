<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories=[
            // Desayunos
            [
                'name' => 'Desayunos',
                'slug' => Str::slug('Desayunos'),
                'category_id' => 1
            ],
            [
                'name' => 'Sandwiches',
                'slug' => Str::slug('Sandwiches'),
                'category_id' => 1
            ],
            [
                'name' => 'Jugos Naturales',
                'slug' => Str::slug('Jugos Naturales'),
                'category_id' => 1
            ],

            // Platos Frios
            [
                'name' => 'Ceviches',
                'slug' => Str::slug('Ceviches'),
                'category_id' => 2
            ],

            // Platos Calientes
            [
                'name' => 'Chicharrones',
                'slug' => Str::slug('Chicharrones'),
                'category_id' => 3
            ],
            [
                'name' => 'Arroces',
                'slug' => Str::slug('Arroces'),
                'category_id' => 3
            ],
            [
                'name' => 'Sudados y Parihuelas',
                'slug' => Str::slug('Sudados y Parihuelas'),
                'category_id' => 3
            ],
            [
                'name' => 'Tortillas y Jaleas',
                'slug' => Str::slug('Tortillas y Jaleas'),
                'category_id' => 3
            ],
            [
                'name' => 'Mixturas',
                'slug' => Str::slug('Mixturas'),
                'category_id' => 3
            ],
            [
                'name' => 'Para Picar',
                'slug' => Str::slug('Para Picar'),
                'category_id' => 3
            ],
            [
                'name' => 'Platos Criollos',
                'slug' => Str::slug('Platos Criollos'),
                'category_id' => 3
            ],
            [
                'name' => 'Almuerzos',
                'slug' => Str::slug('Almuerzos'),
                'category_id' => 3
            ],
            [
                'name' => 'Guarniciones',
                'slug' => Str::slug('Guarniciones'),
                'category_id' => 3
            ],
            [
                'name' => 'Por las Noches',
                'slug' => Str::slug('Por las Noches'),
                'category_id' => 3
            ],
            [
                'name' => 'Menu',
                'slug' => Str::slug('Menu'),
                'category_id' => 3
            ],
            [
                'name' => 'Pollo a la Brasa',
                'slug' => Str::slug('Pollo a la Brasa'),
                'category_id' => 3
            ],
            [
                'name' => 'Menu Ninos',
                'slug' => Str::slug('Menu Ninos'),
                'category_id' => 3
            ],
            // Bebidas
            [
                'name' => 'Gaseosas',
                'slug' => Str::slug('Gaseosas'),
                'category_id' => 4
            ],
            [
                'name' => 'Cervezas',
                'slug' => Str::slug('Cervezas'),
                'category_id' => 4
            ],
            [
                'name' => 'Jugos Naturales',
                'slug' => Str::slug('Jugos Naturales'),
                'category_id' => 4
            ],

        ];

        foreach ($subcategories as $subcategory) {
           Subcategory::create($subcategory);
        }
    }
}
