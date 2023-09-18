<?php

namespace App\Router;

class Router
{
    private array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public function __construct()
    {
        $this->initRoute();
    }

    public function dispatch(string $uri): void
    {
        $route = $this->getRoutes();

        $route[$uri]();
    }

    public function initRoute()
    {
        $routes = $this->getRoutes();

        foreach ($routes as $route) {
            $this->routes[$route->getMethod()][$route->getUri()] = $route;
        }
        dd($this->routes);
    }


    /**
     * @return Route[];
     */
    public function getRoutes(): array
    {
        return require_once APP_PATH.'/config/routes.php';
    }
}
