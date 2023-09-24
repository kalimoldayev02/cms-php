<?php

namespace App\Kernel;

use App\Kernel\Http\Request;
use App\Kernel\Router\Router;

class App
{
    /*
     * получаем все роуты с конфиг файла.
     * и вызываем функцию
     * */
    public function run()
    {
        $view = new View\View();
        $router = new Router($view);
        $request = Request::make();

        $router->dispatch($request->getUri(), $request->getHttpMethod());
    }
}
