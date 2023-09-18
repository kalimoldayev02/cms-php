<?php

define('APP_PATH', __DIR__.'/../');
require_once __DIR__.'/../vendor/autoload.php';

// запуск проекта (точка входа)
$app = new \App\App();
$app->run();
