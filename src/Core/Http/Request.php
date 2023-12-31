<?php

namespace App\Core\Http;

use App\Core\Validator\Validator;

/**
 * Class Request
 * @package App\Core\Http
 */
class Request
{
    protected function __construct(
        private readonly array $get,
        private readonly array $post,
        private readonly array $server,
        private Validator $validator,
    )
    {
    }

    public static function make(Validator $validator): static
    {
        return new static($_GET ?? [], $_POST ?? [], $_SERVER ?? [], $validator);
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
        return trim($this->post[$key]) ?? trim($this->get[$key]) ?? $default;
    }

    public function validate(array $rules, string $table = null): bool
    {
        return $this->validator->validate($this->post(), $rules, $table);
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