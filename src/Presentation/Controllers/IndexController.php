<?php

namespace App\Presentation\Controllers;

class IndexController extends Controller
{
    public function index()
    {
        $this->response->json([
            'title' => ''
        ]);
    }
}