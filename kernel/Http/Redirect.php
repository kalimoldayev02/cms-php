<?php

namespace App\Kernel\Http;

/**
 * Description of Redirect
 *
 * @author Alisher Kalimoldayev <kalimoldayev02@gmail.com>
 */
class Redirect
{
    public function to(string $url, int $status = 200): void
    {
        header("HTTP/1.1 $status");
        header("Location: $url");
    }
}