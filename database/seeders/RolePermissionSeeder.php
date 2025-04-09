<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Create Roles
        $adminRole = Role::create([
            'name' => 'admin',
            'display_name' => 'Admin',
            'description' => 'Administrator with full access',
        ]);

        $userRole = Role::create([
            'name' => 'user',
            'display_name' => 'User',
            'description' => 'Regular user with basic access',
        ]);

        // assign roles to users random users
        $users = \App\Models\User::all();
        // and randomly assign roles
        $users->each(function ($user) use ($adminRole, $userRole) {
            $user->roles()->syncWithoutDetaching([$adminRole->id, $userRole->id]);
        });


        // Create Permissions
        // $manageUsers = Permission::create([
        //     'name' => 'manage-users',
        //     'display_name' => 'Manage Users',
        //     'description' => 'Can create, update, and delete users',
        // ]);

        // $manageProducts = Permission::create([
        //     'name' => 'manage-products',
        //     'display_name' => 'Manage Products',
        //     'description' => 'Can create, update, and delete products',
        // ]);

        // $viewReports = Permission::create([
        //     'name' => 'view-reports',
        //     'display_name' => 'View Reports',
        //     'description' => 'Can view system reports',
        // ]);

        // Assign Permissions to Roles
        // $adminRole->syncPermissions([$manageUsers, $manageProducts, $viewReports]);
        // $dealerRole->syncPermissions([$manageProducts]);
        // $userRole->syncPermissions([$viewReports]);
    }
}
