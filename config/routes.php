<?php

use App\Router\Route;
use App\Controller\Get\HomeController;

return [
    'GET' => [
        '/home' => Route::get(HomeController::class, 'execute')
    ],
];
