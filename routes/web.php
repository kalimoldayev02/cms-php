<?php

namespace App\Layer\Routes;

use App\Core\Router\Route;
use App\Layer\Presentation\Controllers\ArticleController;

Route::get('/articles', ArticleController::class, 'list');
Route::post('/articles', ArticleController::class, 'create');