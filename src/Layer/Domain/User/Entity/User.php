<?php

namespace App\Layer\Domain\User\Entity;

use App\Layer\Domain\User\Dto\UserDto;

/**
 * Class AuthController
 * @package App\Layer\Domain\User\Entity
 */
class User
{
    private static string $table = 'users';

    public function __construct(
        private ?int $id,
        private string $firstName,
        private string $lastName,
        private string $email,
        private string $password,
    )
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public static function getTable(): string
    {
        return self::$table;
    }

    public static function make(UserDto $userDto): self
    {
        return new self(
            $userDto->getId(),
            $userDto->getFirstName(),
            $userDto->getLastName(),
            $userDto->getEmail(),
            $userDto->getPassword(),
        );
    }
}