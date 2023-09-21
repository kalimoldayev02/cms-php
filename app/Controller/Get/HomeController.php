<?php

namespace App\Controller\Get;

use App\Controller\ControllerInterface;

class HomeController implements ControllerInterface
{
    public function execute()
    {
        return 'ccs';
        include_once APP_PATH . '/views/pages/home.php';
    }
}