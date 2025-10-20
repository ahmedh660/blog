<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{

    public function run(): void
    {
        $admin = Role::create(['name'=>'admin']);
        $user = Role::create(['name'=>'user']);
        Permission::create(['name'=>'create products']);
        Permission::create(['name'=>'edit products']);
        Permission::create(['name'=>'view products']);
        $admin->givePermissionTo(Permission::all() );
        $user->givePermissionTo('view products');
    }
}
