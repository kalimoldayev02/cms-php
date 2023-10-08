<?php

namespace App\Kernel\Http;

use App\Kernel\Validator\Validator;

/**
 * Description of Request
 *
 * @author Alisher Kalimoldayev <kalimoldayev02@gmail.com>
 */
class Request
{
    protected function __construct(
        private readonly array $get,
        private readonly array $post,
        private readonly array $server,
        private readonly array $files,
        private readonly array $cookies,
        private Validator $validator,
    )
    {
    }

    public static function make(Validator $validator): static
    {
        return new static($_GET, $_POST, $_SERVER, $_FILES, $_COOKIE, $validator);
    }

    public function getUri(): string
    {
        return strtok($this->server['REQUEST_URI'], '?');
    }

    public function getHttpMethod(): string
    {
        return $this->server['REQUEST_METHOD'];
    }

    public function get(): array
    {
        return $this->get;
    }

    public function post(): array
    {
        return $this->post;
    }

    public function input(string $key, $default = null)
    {
        return $this->post[$key] ?? $this->get[$key] ?? $default;
    }

    public function validate(array $rules): bool
    {
        return $this->validator->validate($this->post(), $rules);
    }

    public function validated(): array
    {
        return $this->validator->validated();
    }

    public function getErrors(): array
    {
        return $this->validator->getErrors();
    }
}