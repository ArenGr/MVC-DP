<?php

namespace App\Controllers;

use App\Core\Controller;
use App\core\psr\container\Container;
use App\Services\Interfaces\UserServiceInterface;
use App\Services\UserService;

class UserController extends Controller
{
    private $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index($id) {
//        $container = new Container();
//        $a = $container->get(UserService::class);
//        $a->getUserById();
//        exit();
        $a = $this->userService->getUserById();
        echo 'hello';
        return 1;
//        var_dump($this->userService);exit();
        // implementation details to display user view
    }
}