<?php

namespace App\Db;

/**
 * Description of DriverInterface
 *
 * @author Alisher Kalimoldayev <kalimoldayev02@gmail.com>
 */
interface DriverInterface
{
    /**
     * @param DbConfigDto $dto
     * @return void
     */
    public function connect(DbConfigDto $dto): void;

    /**
     * @return void
     */
    public function disconnect(): void;
}