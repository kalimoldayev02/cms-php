<?php

namespace App\Controller;

use App\Kernel\Http\Request;
use App\Kernel\View\View;

/**
 * абстракный класс для контроллера
 */

abstract class Controller
{
    public function __construct(protected View $view, protected Request $request)
    {
    }
}