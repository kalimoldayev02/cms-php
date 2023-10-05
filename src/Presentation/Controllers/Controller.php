<?php

namespace App\Presentation\Controllers;

use App\Kernel\Http\Redirect;
use App\Kernel\Http\Request;
use App\Kernel\Http\Response;

/**
 * абстракный класс для контроллера
 */
abstract class Controller
{
    protected array $errors = [];

    public function __construct(
        protected Request  $request,
        protected Redirect $redirect,
        protected Response $response,
    )
    {
    }
}