<?php

namespace App\Layer\Domain\User\Dto;

/**
 * Class UserDto
 * @package App\Layer\Domain\User\Dto
 */
class UserDto
{
    public function __construct(
        private readonly ?int $id,
        private readonly string $firstName,
        private readonly string $lastName,
        private readonly string $email,
        private readonly string $password,
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
}