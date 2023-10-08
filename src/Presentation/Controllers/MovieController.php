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
        $isValid = $this->request->validate([
            'title' => ['min:3', 'required', 'max:25']
        ]);

        if (!$isValid) {
            $this->response->json($this->request->getErrors());
        }
    }
}
