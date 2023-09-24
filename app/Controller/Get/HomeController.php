<?php

namespace App\Controller\Get;

use App\Controller\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $this->view->page('home');
    }
}