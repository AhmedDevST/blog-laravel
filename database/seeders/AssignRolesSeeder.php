<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class AssignRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Retrieve the roles
        $adminRole = Role::where('name', 'Admin')->first();
        $editorRole = Role::where('name', 'Editor')->first();
        $subscriberRole = Role::where('name', 'Subscriber')->first();

        // Check if roles exist
        if (!$adminRole || !$editorRole || !$subscriberRole) {
            $this->command->error('One or more roles do not exist. Please create the roles before running this seeder.');
            return;
        }

        // Assign Admin role to the first user
        $adminUser = User::first();
        if ($adminUser) {
            $adminUser->assignRole($adminRole);
        }

        // Assign Editor role to the first 10 users
        $editorUsers = User::take(10)->get();
        foreach ($editorUsers as $user) {
            $user->assignRole($editorRole);
        }

        // Assign Subscriber role to all users who do not already have a role
        $users = User::all();
        foreach ($users as $user) {
            if ($user->roles->isEmpty()) {
                $user->assignRole($subscriberRole);
            }
        }
    }
}
