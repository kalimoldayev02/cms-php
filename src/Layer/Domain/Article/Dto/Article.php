<?php

namespace App\Layer\Domain\Article\Dto;

/**
 * Class Article
 * @package App\Layer\Domain\Article\Dto
 */
class Article
{
    public function __construct(
        private ?int   $id,
        private string $title,
        private string $description,
    )
    {
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
}