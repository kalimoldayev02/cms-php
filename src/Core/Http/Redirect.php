<?php

namespace App\Core\Http;

/**
 * Class Redirect
 * @package App\Core\Http
 */
class Redirect
{
    public function to(string $url, int $status = 200): void
    {
        header("HTTP/1.1 $status");
        header("Location: $url");
    }
}