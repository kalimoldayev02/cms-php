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
            'db' => include_once APP_PATH . '/config/db.php',
        ];
    }

    public function get(string $key): mixed
    {
        return self::$configs[$key] ?? null;
    }
}