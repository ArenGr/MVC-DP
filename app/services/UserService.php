<?php

namespace App\Services;

use App\Repositories\UserRepositoriesInterface;
use App\Repositories\UserRepository;
use App\Services\Interfaces\UserServiceInterface;

class UserService implements UserServiceInterface
{
    private $userRepo;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepo = $userRepository;
    }

    public function getUserById()
    {
        $this->userRepo->getQuery();
        echo "user from userservice retrieved";
        // implementation details to retrieve user by ID
    }
}