<?php

define('APP_PATH', __DIR__.'/../');
require_once __DIR__.'/../vendor/autoload.php';
$routes = require_once APP_PATH.'/config/routes.php';
$uri = $_SERVER['REQUEST_URI'];

$routes[$uri]();