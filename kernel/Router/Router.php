<?php

namespace App\Kernel\Router;

use App\Controller\Controller;
use App\Kernel\Http\Request;
use App\Kernel\View\View;
use App\System\Config;

class Router
{
    private array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public function __construct(private View $view, private Request $request)
    {
    }

    public function dispatch(string $uri, string $httpMethod): void
    {
        $route = $this->findRoute($uri, $httpMethod);
        if ($route) {
            $method = $route->getMethod();
            $controller = $route->getController();
            /** @var Controller $controller */
            $controller = new $controller($this->view, $this->request);

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
