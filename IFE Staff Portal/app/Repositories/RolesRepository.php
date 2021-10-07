<?php

namespace App\Repositories;
use App\Models\Role;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class RolesRepository extends AbstractRepository
{
    protected $model = Role::class;

    protected $searchable = [
        'query' => [
        'title',
        ],
    ];
}