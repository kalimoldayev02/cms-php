<?php

namespace App\Layer\Presentation\Controllers;

use App\Core\Http\Redirect;
use App\Core\Http\Request;
use App\Core\Http\Response;

/**
 * Class Controller
 * @package App\Layer\Presentation\Controllers
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