<?php

namespace App\Router;

/*
 *  базаый класс для обработки запросов
 * */

class Route
{
    private function __construct(
        private string $uri, // адрес
        private string $method, // http метод
        private        $action // то что обрабатывает маршрут
    )
    {
    }

    /*
     * создает instance для GET
     * */
    public static function get(string $uri, $action): static
    {
        return new static($uri, 'GET', $action);
    }


    /*
     * создает instance для POST
     * */
    public static function post(string $uri, $action): static
    {
        return new static($uri, 'POST', $action);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
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
    public function getAction()
    {
        return $this->action;
    }
}
