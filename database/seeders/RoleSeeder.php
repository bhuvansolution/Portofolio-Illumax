<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleAdmin = Role::updateOrCreate(
            [
                'name' => 'Admin'
            ],
            [
                'name' => 'Admin'
            ]
        );

        $rolesuperadmin = Role::updateOrCreate(
            [
                'name' => 'SuperAdmin'
            ],
            [
                'name' => 'SuperAdmin'
            ]
        );
        $permission = Permission::updateOrCreate(
            [
                'name' => 'viewAdmin'
            ],
            [
                'name' => 'viewAdmin'
            ]
        );
        $permission1 = Permission::updateOrCreate(
            [
                'name' => 'viewSuperAdmin'
            ],
            [
                'name' => 'viewSuperAdmin'
            ]
        );

        $roleAdmin->givePermissionTo($permission);
        $rolesuperadmin->givePermissionTo($permission1);

        $admin = User::find(1);
        $admin->assignRole('Admin');
    }
}
