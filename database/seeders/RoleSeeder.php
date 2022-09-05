<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin',
            'description' => 'akses semua menu'
        ]);
        Role::create([
            'name' => 'user',
            'description' => 'melakukan pembelian'
        ]);
    }
}
