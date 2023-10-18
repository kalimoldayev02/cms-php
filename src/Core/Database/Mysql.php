<?php

namespace App\Core\Database;

use PDOStatement;

/**
 * Class DriverInterface
 * @package App\Core\Database
 */
class Mysql implements DriverInterface
{
    /**
     * @var \PDO
     */
    private $pdo;

    private ?string $queryString = null;

    /**
     * @var ?PDOStatement $result
     */
    private $result = null;

    private bool $isConnected = false;

    public function __construct(private readonly DbConfigDto $dto)
    {
    }

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

    public function execute(?array $params = null): DriverInterface
    {
        return $this->executeQuery($this->getQueryString(), $params);
    }

    public function prepare(string $query): DriverInterface
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

    private function executeQuery(string $query, ?array $params): DriverInterface
    {
        if (!$this->isConnected) {
            $this->connect($this->dto);
        }

        $this->result = $this->pdo->prepare($query);
        $newParams = [];

        if (is_array($params)) {
            foreach ($params AS $key => $param) {
                $newParams[":$key"] = $param;
            }
        }

        try {
            $this->result->execute($newParams);
        } catch (\Exception $exception) {
            $this->refreshQueryString();
            echo $exception->getMessage();
            exit;
        }

        $this->refreshQueryString();
        return $this;
    }

    public function fetchAll(): array
    {
        $result = $this->result->fetchAll(\PDO::FETCH_ASSOC);
        return $result ?? [];
    }

    public function fetch(?string $key = null): array|string
    {
        $result = $this->result->fetch(\PDO::FETCH_ASSOC);
        return $key ? ($result[$key] ?? []) : $result ?? [];
    }
}