<?php

namespace App\Core\Database;

use App\Core\System\Config;

/**
 * Class DriverFactory
 * @package App\Core\Database
 */
class DriverFactory
{
    private static array $instance = [];

    private function __construct()
    {
    }

    public static function make(string $driver = 'mysql')
    {
        if (!isset(self::$instance[$driver])) {
            $config = Config::getInstance()->get('db');
            $dbConfigDto = new DbConfigDto(
                $config['driver'],
                $config['host'],
                $config['port'],
                $config['database'],
                $config['username'],
                $config['password']
            );

            self::$instance[$driver] = match ($driver) {
                'mysql' => new Mysql($dbConfigDto),
            };
        }

        return self::$instance[$driver];
    }
}