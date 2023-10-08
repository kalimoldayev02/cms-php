<?php

namespace App\Kernel\Router;

use App\Presentation\Controllers\Controller;
use App\Kernel\Http\Redirect;
use App\Kernel\Http\Request;
use App\Kernel\System\Json;
use App\Kernel\Http\Response;

/**
 * Description of Router
 *
 * @author Alisher Kalimoldayev <kalimoldayev02@gmail.com>
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
        header('Content-type: application/json');
        echo Json::jsonEncode('404 | not found');
        exit;
    }
}
