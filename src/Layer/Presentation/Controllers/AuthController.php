<?php

namespace App\Layer\Presentation\Controllers;

use App\Core\Http\Controller;
use App\Core\System\Util;
use App\Layer\Domain\User\Dto\UserDto;
use App\Layer\Domain\User\Entity\User;
use App\Layer\UseCase\User\CreateUserUseCase;

/**
 * Class AuthController
 * @package App\Layer\Presentation\Controllers
 */
class AuthController extends Controller
{
    public function registration ()
    {
        $rules = include_once APP_PATH . '/src/Layer/Presentation/Request/Auth/RegistrationRequest.php';
        $isValid = $this->request->validate($rules, User::getTable());

        if (!$isValid) {
            $this->response->json($this->request->getErrors(), 400);
        }

        $createUserDto = new UserDto(
            null,
            $this->request->input('firstName'),
            $this->request->input('lastName'),
            $this->request->input('email'),
            Util::passHash($this->request->input('password')),
        );

        $useCase = new CreateUserUseCase();
        $id = $useCase->create($createUserDto);

        $this->response->json([
            'id' => $id
        ]);
    }
}