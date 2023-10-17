<?php

namespace App\Layer\Presentation\Controllers;

use App\Core\Http\Controller;
use App\Layer\Domain\Article\Dto\CreateArticleDto;

/**
 * Class ArticleController
 * @package App\Layer\Presentation\Controllers
 */
class ArticleController extends Controller
{
    public function list()
    {
        $list = [
            [
                'id' => 1,
                'title' => 'Test article',
                'description' => 'Test description'
            ]
        ];
        $this->response->json($list);
    }


    public function create()
    {
        $rules = include_once APP_PATH . '/src/Layer/Presentation/Request/Article/CreateRequest.php';
        $isValid = $this->request->validate($rules);

        if (!$isValid) {
            $this->response->json($this->request->getErrors());
        }

        $createDto = new CreateArticleDto($this->request->input('title'), $this->request->input('description'));

        $this->response->json([
            'id' => 1
        ]);
    }
}
