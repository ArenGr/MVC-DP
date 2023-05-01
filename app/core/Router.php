<?php

namespace App\Core;

use App\Core\Psr\Container\Container;
use Exception;

class Router
{
    private $routes = [];
    private $uri;

    public function __construct(Container $container)
    {
        $this->DIContainer = $container;
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->routes = require_once(APP_PATH . '/app/routes.php');
    }

    public function run()
    {
        foreach ($this->routes as $pattern => $route) {
            if (preg_match('#^' . $pattern . '\/?(\d+)$#', $this->uri, $matches)) {
                $this->call($route['controller'], $route['action'], array_slice($matches, 1));
                return 0;
            }
        }
        throw new Exception("Route not found for URI: $this->uri");
    }

    public function call($controller, $action, $params)
    {
        $controller = "App\Controllers\\$controller";
        if (class_exists($controller)) {
            if (method_exists($controller, $action)) {
                $c = $this->DIContainer->get($controller);
//                var_dump($c);exit();
                call_user_func_array(array($c, $action), $params);
            }
        }
    }
}