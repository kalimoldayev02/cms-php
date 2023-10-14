<?php

namespace App\Layer\Domain\Movie\Dto;

/**
 * Class CreateMovieDto
 * @package App\Layer\Domain\Movie\Dto
 */
class CreateMovieDto
{
    public function __construct(
        public readonly string $title,
        public readonly string $description,
    )
    {
    }
}