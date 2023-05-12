<?php

namespace Core;

use App\Helpers\NotFoundHandler;
use Core\Psr\Container\ContainerInterface;

class Router
{
    private ContainerInterface $container;
    private array $routes;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->routes = require_once($_SERVER['DOCUMENT_ROOT'] . '/config/routes/routes.php');
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
        NotFoundHandler::handle();
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
