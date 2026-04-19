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
        $superadmin = Role::firstOrCreate(['name' => 'super-admin']);
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $user = Role::firstOrCreate(['name' => 'user']);

        // get all permissions
        $permissions = Permission::all();

        // admin gets everything
        $superadmin->syncPermissions($permissions);

        // limited permissions
        $admin->syncPermissions([
            'can-update',
            'can-delete',
            'can-create',
            'can-view',
        ]);

        $user->syncPermissions([
            'can-view',
            'can-create',
            'can-update',
            'can-delete',
        ]);
    }
}
