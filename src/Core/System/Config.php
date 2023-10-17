<?php

namespace App\Core\System;

/**
 * Class Config
 * @package App\Core\System
 */
class Config
{
    use Singleton;

    protected static array $configs = [];

    protected static function execute()
    {
        if (!file_exists(APP_PATH . '/config/db.php')) {
            throw new \Exception('The file db.php does not exist');
        }

        self::$configs = [
            'db' => include_once APP_PATH . '/config/db.php',
        ];
    }

    public function get(string $key): mixed
    {
        return self::$configs[$key] ?? null;
    }
}