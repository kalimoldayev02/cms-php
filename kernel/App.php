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
        $router = new Router();
        $request = Request::make();

        $router->dispatch($request->getUri(), $request->getHttpMethod());
    }
}
