<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{

    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'job_title'          => 'TMO Liaison Officer',
                'department'          => 'Housing Services',
                'organisation'          => 'London Borough of Hackney',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'created_at'      => now(),
            ],
            [
                'id'             => 2,
                'name'           => 'User',
                'email'          => 'user@user.com',
                'job_title'          => 'Housing Officer',
                'department'          => 'Housing Services',
                'organisation'          => 'London Borough of Hackney',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'created_at'      => now(),
            ],
        ];

        User::insert($users);
    }
}