<?php

namespace Database\Seeders;

use App\Models\UserDetail;
use Illuminate\Database\Seeder;

class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserDetail::create([
            'name' => 'Dany',
            'profession' => 'College Student',
            'full_name' => 'Dany Christian',
            'email' => 'dany@gmail.com',
            'phone' => '081224365',
            'address' => 'Yogyakarta',
        ]);

        UserDetail::create([
            'name' => 'Admin',
            'profession' => 'Admin',
            'full_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => 'Admin',
            'address' => 'Admin',
        ]);

        UserDetail::create([
            'name' => 'Manager',
            'profession' => 'Manager',
            'full_name' => 'Manager',
            'email' => 'manager@gmail.com',
            'phone' => 'Manager',
            'address' => 'Manager',
        ]);
    }
}
