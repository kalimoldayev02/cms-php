<?php

namespace App\Layer\Routes;

use App\Core\Router\Route;
use App\Layer\Presentation\Controllers\MovieController;

Route::get('/movies', MovieController::class, 'list');
Route::post('/movies', MovieController::class, 'create');