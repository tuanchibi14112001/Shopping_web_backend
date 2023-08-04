<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepositories;
use App\Repositories\User\UserRepositoryInterFace;

class UserRepository extends BaseRepositories implements UserRepositoryInterFace
{
    public function getModel()
    {
        return User::class;
    }

}