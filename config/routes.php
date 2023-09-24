<?php

use App\Kernel\Router\Route;
use App\Controller\Get\HomeController;

return [
    'GET' => [
        '/home' => Route::get(HomeController::class, 'execute')
    ],
];
