<?php

namespace App\Controllers;

use App\Services\UserService;
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
//        var_dump("aaa");exit();
        return $this->userService->getUserById();
    }
}
