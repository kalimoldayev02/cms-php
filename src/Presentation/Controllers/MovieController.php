<?php

namespace App\Presentation\Controllers;

class MovieController extends Controller
{
    public function create()
    {
        $isValid = $this->request->validate([
            'title' => ['min:3', 'required', 'max:25']
        ]);

        if (!$isValid) {
            header('Content-type: application/json');
            echo \App\Kernel\System\Json::jsonEncode($this->request->getErrors());
            exit;
        }
    }
}
