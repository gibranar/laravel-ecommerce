<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);
        $manager = Role::create(['name' => 'manager']);

        $admin->givePermissionTo('product-list');
        $admin->givePermissionTo('product-create');
        $admin->givePermissionTo('product-edit');
        $admin->givePermissionTo('product-delete');
        $admin->givePermissionTo('view-dashboard');

        $user->givePermissionTo('product-list');

        $manager->givePermissionTo('product-list');
        $manager->givePermissionTo('product-create');
        $manager->givePermissionTo('product-edit');
        $manager->givePermissionTo('product-delete');
        $manager->givePermissionTo('view-dashboard');
    }
}
