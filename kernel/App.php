<?php

namespace App\Kernel;

use App\Kernel\Http\Redirect;
use App\Kernel\Http\Request;
use App\Kernel\Router\Router;

class App
{
    /**
     * получаем все роуты с конфиг файла.
     * и вызываем функцию
     */
    public function run()
    {
        $view = new View\View();
        $validator = new Validator\Validator();
        $request = Request::make($validator);
        $redirect = new Redirect();
        $router = new Router($view, $request, $redirect);

        $router->dispatch($request->getUri(), $request->getHttpMethod());
    }
}
