<?php
use Core\App\Router;
use Core\Container\Container;

require $_SERVER['DOCUMENT_ROOT'] . '/core/bootstrap.php';

spl_autoload_register(function ($class) {
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