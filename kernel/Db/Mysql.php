<?php

namespace App\Db;

/**
 * Description of Mysql
 *
 * @author Alisher Kalimoldayev <kalimoldayev02@gmail.com>
 */
class Mysql implements DriverInterface
{
    /**
     * @var \PDO
     */
    private $pdo;
    private bool $isConnected = false;

    public function connect(DbConfigDto $dto): void
    {
        try {
            $this->pdo = new \PDO(
                "$dto->driver:host=$dto->host;port=$dto->port;dbname=$dto->database;charset=$dto->charset",
                $dto->username,
                $dto->password
            );
            $this->isConnected = true;
        } catch (\PDOException $exception) {
            $this->isConnected = false;
            echo "Connection failed: " . $exception->getMessage();
            exit;
        }
    }

    public function disconnect(): void
    {
        // TODO: Implement disconnect() method.
    }
}