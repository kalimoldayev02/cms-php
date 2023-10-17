<?php

namespace App\Core\Http;

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