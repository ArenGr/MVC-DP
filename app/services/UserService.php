<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    private $userRepo;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepo = $userRepository;
    }

    public function getUserById()
    {
        $this->userRepo->getQuery();
        echo "autosave works";
        // implementation details to retrieve user by ID
    }
}
