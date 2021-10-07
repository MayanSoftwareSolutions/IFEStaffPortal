<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        $this->call([
            UsersSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            PermissionsRoleSeeder::class,
            RoleUserSeeder::class,
            UserSettingsSeeder::class,
        ]);
    }
}
