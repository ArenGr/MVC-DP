<?php

namespace Core\App;

use Core\Config\Config;
use Core\Exceptions\NotFoundException;
use Psr\Container\ContainerInterface;


class Router
{
    private array $routes;

    public function __construct(private ContainerInterface $container)
    {
        $this->routes = require_once(Config::get('paths.routes').'/routes.php');
    }

    public function run()
    {
        $uri = $_SERVER['REQUEST_URI'];
        foreach ($this->routes as $pattern => $route) {
            if (preg_match('#^' . $pattern . '\/?(\d+)$#', $uri, $matches)) {
                $this->call($route['controller'], $route['action'], array_slice($matches, 1));
                return 0;
            }
        }
        NotFoundException::throw();
    }

    public function call($controller, $action, $params)
    {
        $controller = "App\Controllers\\$controller";
        if (class_exists($controller)) {
            if (method_exists($controller, $action)) {
                $classInstance = $this->container->get($controller);
                call_user_func_array(array($classInstance, $action), $params);
            }
        }
    }
}