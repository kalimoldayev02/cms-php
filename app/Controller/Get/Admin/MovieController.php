<?php

namespace App\Controller\Get\Admin;

use App\Controller\Controller;
use App\System\Session;

class MovieController extends Controller
{
    public function createView()
    {
        $this->view->page('admin/movies/create');
    }
    public function create()
    {
        $isValid = $this->request->validate([
            'title' => ['min:3', 'required', 'max:25']
        ]);

        if (!$isValid) {
            foreach ($this->request->getErrors() as $key => $errors) {
                Session::getInstance()->set($key, $errors);
            }
            $this->redirect->to('/admin/movies/create');
        }
    }
}
