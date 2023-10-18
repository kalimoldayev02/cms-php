<?php

namespace App\Layer\Presentation\Controllers;

use App\Core\Database\DriverFactory;
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

        DriverFactory::make()->prepare('INSERT INTO')
            ->prepare('articles')
            ->prepare("(title, description)")
            ->prepare('VALUES')
            ->prepare('(:title, :description)')
            ->execute(['title' => $createDto->title, 'description' => $createDto->description]);

        $lastId = DriverFactory::make()->prepare('SELECT LAST_INSERT_ID() AS lastId')->execute()->fetch('lastId');

        $this->response->json([
            'id' => $lastId
        ]);
    }
}
