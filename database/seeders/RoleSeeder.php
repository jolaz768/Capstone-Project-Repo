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
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $owner = Role::firstOrCreate(['name' => 'owner']);
        $customer= Role::firstOrCreate(['name' => 'customer']);

        // get all permissions
        $permissions = Permission::all();

        // admin gets everything
        $admin->syncPermissions($permissions);

        // limited permissions
        $owner->syncPermissions([
            'can-update',
            'can-delete',
            'can-create',
            'can-view',
        ]);

        $customer->syncPermissions([
            'can-view',
            'can-create',
            'can-update',
            'can-delete',
        ]);
    }
}
