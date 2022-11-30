<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'viewAny users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'trash users']);
        Permission::create(['name' => 'restore users']);
        Permission::create(['name' => 'delete users']);

        Permission::create(['name' => 'viewAny roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'edit roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'trash roles']);
        Permission::create(['name' => 'restore roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'viewAny products']);
        Permission::create(['name' => 'view products']);
        Permission::create(['name' => 'create products']);
        Permission::create(['name' => 'edit products']);
        Permission::create(['name' => 'update products']);
        Permission::create(['name' => 'trash products']);
        Permission::create(['name' => 'restore products']);
        Permission::create(['name' => 'delete products']);

        Permission::create(['name' => 'viewAny categories']);
        Permission::create(['name' => 'view categories']);
        Permission::create(['name' => 'create categories']);
        Permission::create(['name' => 'edit categories']);
        Permission::create(['name' => 'update categories']);
        Permission::create(['name' => 'trash categories']);
        Permission::create(['name' => 'restore categories']);
        Permission::create(['name' => 'delete categories']);

        Permission::create(['name' => 'viewAny transactions']);
        Permission::create(['name' => 'view transactions']);
        Permission::create(['name' => 'create transactions']);

        $permissions = Permission::all();

        $role = Role::findByName('Super Admin');
        $role->givePermissionTo($permissions);

        $role = Role::findByName('Admin');
        foreach ($permissions as $permission) {
            if (!str_contains($permission->name, 'delete')) {
                $role->givePermissionTo($permission);
            }
        }

        $role = Role::findByName('User');
        foreach ($permissions as $permission) {
            if (!str_contains($permission->name, 'delete') or !str_contains($permission->name, 'trash')) {
                $role->givePermissionTo($permission);
            }
        }
    }
}
