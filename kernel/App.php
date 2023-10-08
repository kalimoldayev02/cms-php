<?php

namespace App\Kernel;

use App\Kernel\Http\Redirect;
use App\Kernel\Http\Request;
use App\Kernel\Http\Response;
use App\Kernel\Router\Router;

/**
 * Description of App
 *
 * @author Alisher Kalimoldayev <kalimoldayev02@gmail.com>
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
