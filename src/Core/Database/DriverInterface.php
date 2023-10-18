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
     * @param array|null $params
     * @return DriverInterface
     */
    public function execute(?array $params = null): DriverInterface;

    /**
     * @param string $query
     * @return DriverInterface
     */
    public function prepare(string $query): DriverInterface;

    /**
     * @return string|null
     */
    public function getQueryString(): ?string;

    /**
     * @return void
     */
    public function refreshQueryString(): void;

    /**
     * @return array
     */
    public function fetchAll(): array;

    /**
     * @return array|string
     */
    public function fetch(?string $key = null): array|string;
}