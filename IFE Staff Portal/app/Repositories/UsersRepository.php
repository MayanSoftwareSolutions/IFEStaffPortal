<?php

namespace App\Repositories;
use App\Models\User;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class UsersRepository extends AbstractRepository
{
    protected $model = User::class;

    protected $searchable = [
        'query' => [
        'name',
        'email',
        'job_title',
        'department',
        'organisation',
        'last_login',
        'last_login_ip',
        'active',
        ],
    ];
}