<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'product-list']);
        Permission::create(['name' => 'product-create']);
        Permission::create(['name' => 'product-edit']);
        Permission::create(['name' => 'product-delete']);
        Permission::create(['name' => 'view-dashboard']);
    }
}
