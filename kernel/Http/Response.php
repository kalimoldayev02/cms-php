<?php

namespace App\Kernel\Http;

class Response
{
    public function json($data, int $status = 200): void
    {
        header("HTTP/1.1 $status");
        header('Content-type: application/json');
        echo json_encode($data);
        exit;
    }
}