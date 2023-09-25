<?php

use App\Kernel\Router\Route;
use App\Controller\Get\HomeController;
use App\Controller\Get\Admin\MovieController;

return [
    'GET' => [
        '/home' => Route::get(HomeController::class, 'index'),
        '/admin/movies/create' => Route::get(MovieController::class, 'createView')
    ],
    'POST' => [
        '/admin/movies/create' => Route::post(MovieController::class, 'create')
    ]
];
