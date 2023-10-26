<?php

namespace App\Layer\Presentation\Controllers;

use App\Core\Http\Controller;
use App\Layer\Domain\User\Entity\User;

/**
 * Class AuthController
 * @package App\Layer\Presentation\Controllers
 */
class AuthController extends Controller
{
    public function registration ()
    {
        $rules = include_once APP_PATH . '/src/Layer/Presentation/Request/Auth/RegistrationRequest.php';
        $isValid = $this->request->validate($rules, User::$table);

        if (!$isValid) {
            $this->response->json($this->request->getErrors());
        }
    }
}