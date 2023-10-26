<?php

namespace App\Layer\Domain\User\Entity;

/**
 * Class AuthController
 * @package App\Layer\Domain\User\Entity
 */
class User
{
    public static string $table = 'users';

    private ?int $id = null;
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $password;


}