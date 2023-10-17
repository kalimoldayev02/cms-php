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

    /**
     * @param array|null $bind
     * @return DriverInterface
     */
    public function execute(?array $bind): DriverInterface;

    /**
     * @param string $query
     * @return DriverInterface
     */
    public function select(string $query): DriverInterface;

    /**
     * @return string|null
     */
    public function getQueryString(): ?string;

    public function refreshQueryString(): void;
}