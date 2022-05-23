<?php

namespace Database\Seeders;
use App\Models\Table;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tables=[
            [
                'name' => 'Mesa - 1',
                'slug' => Str::slug('Mesa - 1'),
                'status' => 1
            ],
            [
                'name' => 'Mesa - 2',
                'slug' => Str::slug('Mesa - 2'),
                'status' => 1
            ],
            [
                'name' => 'Mesa - 3',
                'slug' => Str::slug('Mesa - 3'),
                'status' => 1
            ],
            [
                'name' => 'Mesa - 4',
                'slug' => Str::slug('Mesa - 4'),
                'status' => 1
            ],
            [
                'name' => 'Mesa - 5',
                'slug' => Str::slug('Mesa - 5'),
                'status' => 1
            ],
            [
                'name' => 'Mesa - 6',
                'slug' => Str::slug('Mesa - 6'),
                'status' => 1
            ],
            [
                'name' => 'Mesa - 7',
                'slug' => Str::slug('Mesa - 7'),
                'status' => 1
            ],
            [
                'name' => 'Mesa - 8',
                'slug' => Str::slug('Mesa - 8'),
                'status' => 1
            ],

        ];

        foreach ($tables as $table) {
           Table::create($table);
        }
    }
}
