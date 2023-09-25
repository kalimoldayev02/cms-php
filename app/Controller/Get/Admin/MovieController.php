<?php

namespace App\Controller\Get\Admin;

use App\Controller\Controller;

class MovieController extends Controller
{
    public function createView()
    {
        $this->view->page('admin/movies/create');
    }
    public function create()
    {
        dd($this->request->get(), $this->request->get());
        $this->view->page('admin/movies/create');
    }
}
