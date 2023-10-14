<?php

namespace App\Core\Database;

/**
 * Class DbConfigDto
 * @package App\Core\Database
 */
class DbConfigDto
{
    /**
     * @param string $driver
     * @param string $host
     * @param string $port
     * @param string $database
     * @param string $username
     * @param string $password
     * @param string $charset
     */
    public function __construct(
        public readonly string $driver,
        public readonly string $host,
        public readonly string $port,
        public readonly string $database,
        public readonly string $username,
        public readonly string $password,
        public readonly string $charset,
    )
    {
    }
}