<?php

namespace App\Routes;

use App\Kernel\Router\Route;
use App\Presentation\Controllers\IndexController;

Route::get('/', IndexController::class, 'index');
Route::get('/test', IndexController::class, 'index');