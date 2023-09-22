<?php

namespace App\Router;

use App\Controller\ControllerInterface;
use App\System\Config;

class Router
{
    private array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public function __construct()
    {
    }

    public function dispatch(string $uri, string $httpMethod): void
    {
        $route = $this->findRoute($uri, $httpMethod);
        if ($route) {
            $method = $route->getMethod();
            $controller = $route->getController();
            $controller = new $controller();

            $controller->$method();
            exit;
        }
        $this->notFound();
    }

    /**
     * @return ?Route;
     */
    private function findRoute(string $uri, string $httpMethod): ?object
    {
        $result = Config::getInstance()->getRoutesConfig()[$httpMethod][$uri] ?? null;

        return $result;
    }

    private function notFound(): void
    {
        echo '404 | not found';
        exit;
    }
}
