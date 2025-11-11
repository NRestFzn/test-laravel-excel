<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Spatie\Permission\PermissionRegistrar;

class DefaultUserRole extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['name' => 'add book']);
        Permission::create(['name' => 'edit book']);
        Permission::create(['name' => 'delete book']);
        Permission::create(['name' => 'view dashboard']);
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleGuest = Role::create(['name' => 'guest']);
        $roleAdmin->givePermissionTo('add book');
        $roleAdmin->givePermissionTo('edit book');
        $roleAdmin->givePermissionTo('delete book');
        $roleAdmin->givePermissionTo('view dashboard');
        $roleGuest->givePermissionTo('view dashboard');
        $adminUser = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password')
        ]);
        $adminUser->assignRole($roleAdmin);
        $guestUser = User::factory()->create([
            'name' => 'Guest User',
            'email' => 'user@example.com',
            'password' => bcrypt('password')
        ]);

        $guestUser->assignRole($roleGuest);
    }
}
