<?php

namespace App\Service\User;

use App\Repositories\User\UserRepositoryInterFace;
use App\Service\BaseService;

class UserService extends BaseService implements  UserServiceInterface

{
    public $repository;

    public function __construct(UserRepositoryInterFace $userRepository)
    {
        $this->repository = $userRepository;
    }

}
