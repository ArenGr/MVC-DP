<?php

namespace App\Controllers;

use App\Models\User;
use App\Services\UserService;
use Core\Config\Config;
use core\Controller;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return $this->userService->getUserById();
    }
}
