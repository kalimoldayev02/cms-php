<?php

namespace App\Http;

class Request
{
    protected function __construct(
        private readonly array $get,
        private readonly array $post,
        private readonly array $server,
        private readonly array $files,
        private readonly array $cookies,
    )
    {
    }

    public static function make(): static
    {
        return new static($_GET, $_POST, $_SERVER, $_FILES, $_COOKIE);
    }

    public function getUri(): string
    {
        return strtok($this->server['REQUEST_URI'], '?');
    }

    public function getHttpMethod(): string
    {
        return $this->server['REQUEST_METHOD'];
    }
}