<?php

namespace App\Kernel\Router;

/*
 *  базаый класс для обработки запросов
 * */

use App\Controller\ControllerInterface;

class Route
{
    private function __construct(private $controller, private string $method)
    {
    }

    /*
     * создает instance для GET
     * */
    public static function get(string $controller, string $method): static
    {
        return new static($controller, $method);
    }


    /*
     * создает instance для POST
     * */
    public static function post(string $controller, string $method): static
    {
        return new static($controller, $method);
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
}
