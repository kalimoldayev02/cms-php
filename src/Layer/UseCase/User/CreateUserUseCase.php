<?php

namespace App\Layer\UseCase\User;

use App\Layer\Domain\User\Dto\UserDto;
use App\Layer\Domain\User\Entity\User;
use App\Layer\Domain\User\UserRepository;

/**
 * Class Article
 * @package App\Layer\Domain\Article\Dto
 */
class CreateUserUseCase
{
    public function __construct(
    )
    {
    }

    public function create(UserDto $createUserDto): int
    {
        $userRepository = new UserRepository();
        $userRepository->create(User::make($createUserDto));
        return $userRepository->getLastId();
    }
}