<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Create Roles
        $adminRole = Role::create(['name' => 'admin']);
        $staffRole = Role::create(['name' => 'staff']);

        // Create Permissions
        $permissions = [
            'manage users',
            'create users',
            'manage settings',
            'manage themes',
            'create themes',
            'manage sites',
            'create sites',
            'manage roles',
            'create roles',
            'manage permissions',
            'create permissions'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Assign Permissions to Roles
        $adminRole->givePermissionTo($permissions); // Admin gets all permissions
        $staffRole->givePermissionTo(['manage themes','manage sites','create sites']);
    }
}
