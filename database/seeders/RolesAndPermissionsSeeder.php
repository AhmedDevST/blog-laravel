<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         // Reset cached roles and permissions
         app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

         // Create permissions
          Permission::create(['name' => 'view posts']);
          Permission::create(['name' => 'create posts']);
          Permission::create(['name' => 'edit posts']);
          Permission::create(['name' => 'delete posts']);
 
         // Create roles and assign created permissions
 
         // Admin role
         $admin = Role::create(['name' => 'Admin']);
         $admin->givePermissionTo(Permission::all());
 
         // Editor role
         $editor = Role::create(['name' => 'Editor']);
         $editor->givePermissionTo(['create posts', 'edit posts']);
 
         // Subscriber role
         $subscriber = Role::create(['name' => 'Subscriber']);
         $subscriber->givePermissionTo('view posts');
    }
}
