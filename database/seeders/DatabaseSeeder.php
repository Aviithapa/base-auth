<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);

        // Create permissions
        Permission::create(['name' => 'edit form']);
        Permission::create(['name' => 'delete form']);
        Permission::create(['name' => 'view dashboard']);
        Permission::create(['name' => 'add form']);
        Permission::create(['name' => 'show form']);


        // Assign permissions to roles
        $admin->givePermissionTo(['edit form', 'delete form', 'view dashboard', 'add form', 'show form']);
        $user->givePermissionTo('view dashboard');
    }
}
