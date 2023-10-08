<?php

namespace App\Presentation\Controllers;

/**
 * Description of MovieController
 *
 * @author Alisher Kalimoldayev <kalimoldayev02@gmail.com>
 */
class MovieController extends Controller
{
    public function list()
    {
        $list = [
            [
                'id' => 1,
                'title' => 'Test movie',
                'description' => 'Test description'
            ]
        ];
        $this->response->json($list);
    }


    public function create()
    {
        $rules = include_once APP_PATH . '/src/Presentation/Request/Movie/CreateRequest.php';
        $isValid = $this->request->validate($rules);

        if (!$isValid) {
            $this->response->json($this->request->getErrors());
        }

        dd($this->request->validated());
        $this->response->json([
            'id' => 1
        ]);
    }
}
