<?php

namespace App\Core\Database;

/**
 * Class DriverInterface
 * @package App\Core\Database
 */
class Mysql implements DriverInterface
{
    private ?string $queryString = null;

    /**
     * @var \PDO
     */
    private $pdo;
    private bool $isConnected = false;

    public function connect(DbConfigDto $dto): void
    {
        try {
            $dsn = "$dto->driver:host=$dto->host;port=$dto->port;dbname=$dto->database";
            $this->pdo = new \PDO($dsn, $dto->username, $dto->password);
            $this->isConnected = true;
        } catch (\PDOException $exception) {
            $this->isConnected = false;
            echo "Connection failed: " . $exception->getMessage();
            exit;
        }
    }

    public function disconnect(): void
    {

    }

    public function execute(?array $bind): DriverInterface
    {
        return $this;
    }

    public function select(string $query): DriverInterface
    {
        $this->queryString .= $query . ' ';
        return $this;
    }

    public function getQueryString(): ?string
    {
        return $this->queryString;
    }

    public function refreshQueryString(): void
    {
        $this->queryString = null;
    }
}