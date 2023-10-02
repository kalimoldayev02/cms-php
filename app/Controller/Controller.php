<?php

namespace App\Controller;

use App\Kernel\Http\Redirect;
use App\Kernel\Http\Request;
use App\Kernel\Validator\Validator;
use App\Kernel\View\View;

/**
 * абстракный класс для контроллера
 */
abstract class Controller
{
    protected array $errors = [];

    public function __construct(
        protected View     $view,
        protected Request  $request,
        protected Redirect $redirect,
    )
    {
    }
}