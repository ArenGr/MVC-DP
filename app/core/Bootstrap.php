<?php

namespace App\Core;

use App\Controllers\UserController;
use App\core\psr\container\Container;
use App\Services\UserService;

class Bootstrap
{

    public function __construct()
    {
        $container = new Container();
        $container->register('UserServiceInterface', function() {
            return new UserService();
        });

        $userService = $container->resolve('UserServiceInterface');
        $userController = new UserController($userService);
    }
}