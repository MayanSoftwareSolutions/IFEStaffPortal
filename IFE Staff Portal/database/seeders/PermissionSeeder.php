<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{

    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'area'  =>  'Users',
                'title' => 'user_access',
                'description' => 'Can access users'
            ],
            [
                'id'    => 2,
                'area'  =>  'Users',
                'title' => 'user_create',
                'description' => 'Can create users'
            ],
            [
                'id'    => 3,
                'area'  =>  'Users',
                'title' => 'user_edit',
                'description' => 'Can edit users'
            ],
            [
                'id'    => 4,
                'area'  =>  'Users',
                'title' => 'user_delete',
                'description' => 'Can delete users'
            ],
            [
                'id'    => 5,
                'area'  =>  'Activity',
                'title' => 'activity_access',
                'description' => 'Can see activity'
            ],
            [
                'id'    => 6,
                'area'  =>  'Permissions',
                'title' => 'role_access',
                'description' => 'Can access permissions'
            ],
            [
                'id'    => 7,
                'area'  =>  'Permissions',
                'title' => 'role_create',
                'description' => 'Can create permissions'
            ],
            [
                'id'    => 8,
                'area'  =>  'Permissions',
                'title' => 'role_edit',
                'description' => 'Can edit permissions'
            ],
            [
                'id'    => 9,
                'area'  =>  'Permissions',
                'title' => 'role_delete',
                'description' => 'Can delete permissions'
            ],
            [
                'id'    => 10,
                'area'  =>  'Configuration',
                'title' => 'own_config',
                'description' => 'Can configure own system'
            ],
            [
                'id'    => 11,
                'area'  =>  'Configuration',
                'title' => 'other_config',
                'description' => 'Can configure users systems'
            ],
        ];

        Permission::insert($permissions);
    }
}
