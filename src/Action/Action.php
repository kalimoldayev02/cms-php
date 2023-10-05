<?php

namespace App\Action;

use App\Kernel\Http\Redirect;
use App\Kernel\Http\Request;

/**
 * абстракный класс для экшенов
 */
class Action
{
    public function __construct(
        protected Request  $request,
    )
    {
    }
}