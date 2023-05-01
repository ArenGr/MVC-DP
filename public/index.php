<?php

use App\Core\Router;

define('APP_PATH', realpath(__DIR__ . '/../'));

require APP_PATH . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(APP_PATH);
$dotenv->load();


spl_autoload_register(function ($class)
{
    $dirNames = explode('\\', $class);
    $className = array_pop($dirNames);
    $file = APP_PATH . '/' . implode('/', array_map('lcfirst', $dirNames)) . "/$className.php";

    if (file_exists($file)) {
        require_once $file;
    }
});

$DIContainer = new \App\Core\Psr\Container\Container();
$router = new Router($DIContainer);
$router->run();
