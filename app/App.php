<?php

namespace App;

use App\Http\Request;
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
        $request = Request::make();

        $router->dispatch($request->getUri(), $request->getHttpMethod());
    }
}
