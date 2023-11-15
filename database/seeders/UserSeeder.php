<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Dany Christian',
            'email' => 'dany@gmail.com',
            'password' => Hash::make('password')
        ]);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('SelamatDapatsepuluhrb')
        ]);

        $manager = User::create([
            'name' => 'Manager',
            'email' => 'manager@gmail.com',
            'password' => Hash::make('password')
        ]);

        $user->assignRole('user');
        $admin->assignRole('admin');
        $manager->assignRole('manager');
    }
}
