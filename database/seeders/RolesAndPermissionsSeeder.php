<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

         // post permissions
        Permission::firstOrCreate(['name' => 'view_any_posts']);
        Permission::firstOrCreate(['name' => 'view_posts']);
        Permission::firstOrCreate(['name' => 'create_posts']);
        Permission::firstOrCreate(['name' => 'update_posts']);
        Permission::firstOrCreate(['name' => 'delete_posts']);
        Permission::firstOrCreate(['name' => 'restore_posts']);
        Permission::firstOrCreate(['name' => 'force_delete_posts']);
        Permission::firstOrCreate(['name' => 'force_delete_any_posts']);
        Permission::firstOrCreate(['name' => 'restore_any_posts']);
        Permission::firstOrCreate(['name' => 'replicate_posts']);
        Permission::firstOrCreate(['name' => 'reorder_posts']);

        // user permissions
        Permission::firstOrCreate(['name' => 'view_any_users']);
        Permission::firstOrCreate(['name' => 'view_users']);
        Permission::firstOrCreate(['name' => 'create_users']);
        Permission::firstOrCreate(['name' => 'update_users']);
        Permission::firstOrCreate(['name' => 'delete_users']);
        Permission::firstOrCreate(['name' => 'restore_users']);
        Permission::firstOrCreate(['name' => 'force_delete_users']);
        Permission::firstOrCreate(['name' => 'force_delete_any_users']);
        Permission::firstOrCreate(['name' => 'restore_any_users']);
        Permission::firstOrCreate(['name' => 'replicate_users']);
        Permission::firstOrCreate(['name' => 'reorder_users']);

        // roles permissions
        Permission::firstOrCreate(['name' => 'view_any_roles']);
        Permission::firstOrCreate(['name' => 'view_roles']);
        Permission::firstOrCreate(['name' => 'create_roles']);
        Permission::firstOrCreate(['name' => 'update_roles']);
        Permission::firstOrCreate(['name' => 'delete_roles']);
        Permission::firstOrCreate(['name' => 'restore_roles']);
        Permission::firstOrCreate(['name' => 'force_delete_roles']);
        Permission::firstOrCreate(['name' => 'force_delete_any_roles']);
        Permission::firstOrCreate(['name' => 'restore_any_roles']);
        Permission::firstOrCreate(['name' => 'replicate_roles']);
        Permission::firstOrCreate(['name' => 'reorder_roles']);

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create roles and assign created permissions
        Role::firstOrCreate(['name' => 'super_admin'])
            ->givePermissionTo(Permission::all());
    }
}
