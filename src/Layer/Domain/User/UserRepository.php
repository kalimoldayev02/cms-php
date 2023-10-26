<?php

namespace App\Layer\Domain\User;

use App\Core\Repository;
use App\Layer\Domain\User\Entity\User;

/**
 * Class UserRepository
 * @package App\Layer\Domain\User
 */
class UserRepository extends Repository
{
    public function create(User $user)
    {
        $data = [
            'firstName' => $user->getFirstName(),
            'lastName' => $user->getLastName(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
        ];

        $this->db->prepare('INSERT INTO')
            ->prepare($user::getTable())
            ->prepare('(' . implode(', ', array_keys($data)) . ')')
            ->prepare('VALUES')
            ->prepare('(:firstName, :lastName, :email, :password)')
            ->execute($data);
    }

    public function getLastId(): int
    {
        return $this->db->prepare('SELECT LAST_INSERT_ID() AS lastId FROM ' . User::getTable())
            ->execute()->fetch('lastId');
    }
}