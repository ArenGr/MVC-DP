<?php

namespace App\Controllers;

use App\Services\UserService;
use Core\App\Controller;

class UserController extends Controller
{
    public function __construct(private UserService $userService)
    {
    }

    public function index()
    {
        $this->view()->render('home');
    }

    public function show($id)
    {
        $data = $this->userService->getUser($id);
        $this->view()->render('profile', ['data' => $data]);

    }
}