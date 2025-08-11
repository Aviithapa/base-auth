<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
      public function run(): void
    {
        // Create roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole  = Role::firstOrCreate(['name' => 'user']);

        // Create permissions
        $permissions = [
            'edit form',
            'delete form',
            'view dashboard',
            'add form',
            'show form'
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // Assign permissions to roles
        $adminRole->givePermissionTo($permissions);
        $userRole->givePermissionTo(['view dashboard']);

        // Create admin user
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Super Admin',
                'phone' => '9800000000',
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // Change for production
                'is_phone_verified' => 1,
                'status' => 'active',
            ]
        );
        $adminUser->assignRole($adminRole);

        // Create normal user
        $normalUser = User::firstOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'Normal User',
                'phone' => '9811111111',
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // Change for production
                'is_phone_verified' => 0,
                'status' => 'active',
            ]
        );
        $normalUser->assignRole($userRole);
    }
}
