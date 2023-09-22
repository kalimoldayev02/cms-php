<?php

namespace App\Controller\Get;

use App\Controller\ControllerInterface;

class HomeController implements ControllerInterface
{
    public function execute()
    {
        include_once APP_PATH . '/views/pages/home.php';
    }
}