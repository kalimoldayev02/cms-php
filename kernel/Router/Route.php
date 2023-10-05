<?php

namespace App\Kernel\Router;

/**
 *  базаый класс для обработки запросов
 */
class Route
{
    private static array $routes = [];

    private function __construct(private $url, private $controller, private string $action, string $httpMethod)
    {
        self::$routes[$httpMethod][$this->url] = [$controller, $action];
    }

    /*
     * создает instance для GET
     * */
    public static function get(string $url, string $controller, string $action): static
    {
        return new static($url, $controller, $action, 'GET');
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return mixed
     */
    public function getController(): mixed
    {
        return $this->controller;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return array
     */
    public static function getRoutes(): array
    {
        return self::$routes;
    }

    public function getControllerByRoute()
    {
        
    }
}
