<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'RadenFebri',
            'email' => 'febriye12@gmail.com',
            'password' => bcrypt('Febri2303'),
        ]);

        $admin->assignRole('Super Admin');

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('Febri2303'),
        ]);

        $user->assignRole('Admin');

        $user = User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('Febri2303'),
        ]);

        $user->assignRole('user');
    }

}
