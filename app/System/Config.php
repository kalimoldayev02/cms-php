<?php

namespace App\System;

class Config
{
    use Singleton;

    protected static array $configs = [];

    protected static function execute()
    {
        self::$configs = [
            'routes' => include_once APP_PATH . '/config/routes.php',
        ];
    }


    public function getConfig(): array
    {
        return self::$configs;
    }

    public function getRoutesConfig($test = false)
    {
        if ($test) {
            dd(self::$configs);
        }
        if (isset(self::$configs['routes'])) {
            return self::$configs['routes'];
        };
        return [];
    }
}