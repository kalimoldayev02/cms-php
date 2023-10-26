<?php

namespace App\Core\Router;

use App\Core\Http\Redirect;
use App\Core\Http\Request;
use App\Core\Http\Response;

/**
 * Class Router
 * @package App\Core\Http
 */
class Router
{
    public function __construct(
        private Request  $request,
        private Redirect $redirect,
        private Response $response,
    )
    {
    }

    public function dispatch(string $uri, string $httpMethod): void
    {
        $routes = Route::getRoutes();

        if ($this->isExistRoute($uri, $httpMethod, $routes)) {
            [$controller, $action] = $routes[$httpMethod][$uri];

            /** @var Controller $controller */
            $controller = new $controller($this->request, $this->redirect, $this->response);

            $controller->$action();
            exit;
        }
        $this->notFound();
    }

    /**
     * @return bool;
     */
    private function isExistRoute(string $uri, string $httpMethod, array $routes): bool
    {
        return isset($routes[$httpMethod][$uri]);
    }

    private function notFound(): void
    {
        $this->response->json([
            '404 | not found'
        ], 404);
    }
}
