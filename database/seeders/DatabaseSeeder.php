<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\RoleSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
         // Create Admin Role if not exists
        $role = Role::firstOrCreate(['name' => 'super-admin']);

        // Get all permissions
        $permissions = Permission::all();

        // Assign all permissions to admin role
        $role->syncPermissions($permissions);

        // Create Admin User
        $user = User::firstOrCreate(
            ['email' => 'superadmin@gmail.com'],
            [
                'name' => 'superadmin',
                'password' => Hash::make('123123123'),
            ]
        );
         $user->assignRole($role);

          $role = Role::firstOrCreate(['name' => 'admin']);

        // Get all permissions
        $permissions = Permission::wherein('name', ['can-view', 'can-create', 'can-update', 'can-delete'])->get();

        // Assign all permissions to admin role
        $role->syncPermissions($permissions);

        // Create Admin User
        $user = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'superadmin',
                'password' => Hash::make('123123123'),
            ]
        );
         $user->assignRole($role);
         


                  $role = Role::firstOrCreate(['name' => 'customer']);

        // Get all permissions
        $permissions = Permission::wherein('name', ['can-view', 'can-create', 'can-update', 'can-delete'])->get();

        // Assign all permissions to admin role
        $role->syncPermissions($permissions);

        // Create Admin User
        $user = User::firstOrCreate(
            ['email' => 'customer@gmail.com'],
            [
                'name' => 'customer',
                'password' => Hash::make('123123123'),
            ]
        );
         $user->assignRole($role);


        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class
        ]);
    }
}
