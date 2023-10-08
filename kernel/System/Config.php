<?php

namespace App\Kernel\System;

/**
 * Description of Config
 *
 * @author Alisher Kalimoldayev <kalimoldayev02@gmail.com>
 */
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

    public function getRoutesConfig($test = false)
    {
        if (isset(self::$configs['routes'])) {
            return self::$configs['routes'];
        };
        return [];
    }
}