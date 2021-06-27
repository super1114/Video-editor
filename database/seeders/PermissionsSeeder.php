<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list tankers']);
        Permission::create(['name' => 'view tankers']);
        Permission::create(['name' => 'create tankers']);
        Permission::create(['name' => 'update tankers']);
        Permission::create(['name' => 'delete tankers']);

        Permission::create(['name' => 'list companies']);
        Permission::create(['name' => 'view companies']);
        Permission::create(['name' => 'create companies']);
        Permission::create(['name' => 'update companies']);
        Permission::create(['name' => 'delete companies']);

        Permission::create(['name' => 'list settings']);
        Permission::create(['name' => 'view settings']);
        Permission::create(['name' => 'create settings']);
        Permission::create(['name' => 'update settings']);
        Permission::create(['name' => 'delete settings']);

        Permission::create(['name' => 'list logs']);
        Permission::create(['name' => 'view logs']);
        Permission::create(['name' => 'create logs']);
        Permission::create(['name' => 'update logs']);
        Permission::create(['name' => 'delete logs']);

        Permission::create(['name' => 'list hires']);
        Permission::create(['name' => 'view hires']);
        Permission::create(['name' => 'create hires']);
        Permission::create(['name' => 'update hires']);
        Permission::create(['name' => 'delete hires']);

        Permission::create(['name' => 'list qrs']);
        Permission::create(['name' => 'view qrs']);
        Permission::create(['name' => 'create qrs']);
        Permission::create(['name' => 'update qrs']);
        Permission::create(['name' => 'delete qrs']);

        Permission::create(['name' => 'list checklistrigids']);
        Permission::create(['name' => 'view checklistrigids']);
        Permission::create(['name' => 'create checklistrigids']);
        Permission::create(['name' => 'update checklistrigids']);
        Permission::create(['name' => 'delete checklistrigids']);

        Permission::create(['name' => 'list checklistnrs']);
        Permission::create(['name' => 'view checklistnrs']);
        Permission::create(['name' => 'create checklistnrs']);
        Permission::create(['name' => 'update checklistnrs']);
        Permission::create(['name' => 'delete checklistnrs']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
