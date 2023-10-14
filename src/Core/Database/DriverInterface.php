<?php

namespace App\Core\Database;

/**
 * Interface DriverInterface
 * @package App\Core\Database
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