<?php

namespace App\Db;

/**
 * Description of DbConfigDto
 *
 * @author Alisher Kalimoldayev <kalimoldayev02@gmail.com>
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