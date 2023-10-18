<?php

namespace App\Layer\Domain\Article\Dto;

/**
 * Class CreateArticleDto
 * @package App\Layer\Domain\Article\Dto
 */
class CreateArticleDto
{
    public function __construct(
        public readonly string $title,
        public readonly string $description,
    )
    {
    }

    public function getFields(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
        ];
    }
}