<?php

use core\container\Container;
use Core\Router;

require 'bootstrap.php';

spl_autoload_register(function ($class)
{
    $dirNames = explode('\\', $class);
    $className = array_pop($dirNames);
    $file = APP_ROOT . '/' . implode('/', array_map('lcfirst', $dirNames)) . "/$className.php";

    if (file_exists($file)) {
        require_once $file;
    }
});

$container = new Container();
$router = new Router($container);
$router->run();
