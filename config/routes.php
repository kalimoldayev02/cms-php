<?php

use App\Router\Route;
use App\Controller\HomeController;

return [
    'GET' => [
        '/home' => Route::get(HomeController::class, 'index')
    ],
];
