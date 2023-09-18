<?php

namespace App;

use App\Router\Router;

class App
{
    /*
     * получаем все роуты с конфиг файла.
     * и вызываем функцию
     * */
    public function run()
    {
        $router = new Router();
        $uri = $_SERVER['REQUEST_URI'];
        $router->dispatch($uri);
    }
}
