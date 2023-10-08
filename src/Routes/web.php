<?php

namespace App\Routes;

use App\Kernel\Router\Route;
use App\Presentation\Controllers\MovieController;

Route::get('/movies', MovieController::class, 'list');
Route::post('/movies', MovieController::class, 'create');