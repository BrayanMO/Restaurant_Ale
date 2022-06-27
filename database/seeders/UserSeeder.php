<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'cocina']);
        $role3 = Role::create(['name' => 'mesero']);

        User::create([
            'name' => 'Admin Alexia',
            'email' => 'admin@mialexia.com',
            'password' => bcrypt('123456')
        ])->assignRole('admin');

    }
}
