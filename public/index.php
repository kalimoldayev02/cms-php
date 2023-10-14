<?php

define('APP_PATH', __DIR__.'/../');
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__ . '/../src/routes.php';

// запуск проекта (точка входа)
$app = new \App\Core\App();
$app->run();
