<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    Permission::create([
        'name' => 'manajemen permission'
    ]);

    Permission::create([
        'name' => 'slide permission'
    ]);

    Permission::create([
        'name' => 'galeri permission'
    ]);

    Permission::create([
        'name' => 'blog permission'
    ]);

    Permission::create([
        'name' => 'iklan permission'
    ]);

    Permission::create([
        'name' => 'jadwal permission'
    ]);

    Permission::create([
        'name' => 'store permission'
    ]);

    Permission::create([
        'name' => 'anggota permission'
    ]);

    Permission::create([
        'name' => 'setting permission'
    ]);

    Permission::create([
        'name' => 'create'
    ]);

    Permission::create([
        'name' => 'edit'
    ]);

    Permission::create([
        'name' => 'delete'
    ]);

    }
}
