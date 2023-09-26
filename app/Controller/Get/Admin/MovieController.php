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
        $rules = [
            'title' => ['min:3', 'required', 'max:25']
        ];
        $this->request->validate()->validate($this->request->post(), $rules);
    }
}
