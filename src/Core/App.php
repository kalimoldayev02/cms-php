<?php

namespace App\Core;

use App\Core\Http\Redirect;
use App\Core\Http\Request;
use App\Core\Http\Response;
use App\Core\Router\Router;

/**
 * Class App
 * @package App\Core
 */
class App
{
    /**
     * получаем все роуты с конфиг файла.
     * и вызываем функцию
     */
    public function run()
    {
        $validator = new Validator\Validator();
        $request = Request::make($validator);
        $redirect = new Redirect();
        $response = new Response();
        $router = new Router($request, $redirect, $response);

        $router->dispatch($request->getUri(), $request->getHttpMethod());
    }
}
