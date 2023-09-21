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

    public function dispatch(string $uri, string $method): void
    {
        $route = $this->findRoute($uri, $method);

        dd($route, 'dispatch');
        dd($route);


        $route->getAction()();
    }

    private function findRoute(string $uri, string $httpMethod)
    {
        $result = Config::getInstance()->getRoutesConfig()[$httpMethod][$uri] ?? null;
        dd(current((array)$result));
        foreach ($result as $item) {
            dd($item);
        };

        return $result;
    }

    /**
     * @return Route[];
     */
    public function getRoutes()
    {
        return 'cas';
    }

    private function notFound(): void
    {
        echo '404 | not found';
        exit;
    }
}
