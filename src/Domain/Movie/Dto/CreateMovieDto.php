<?php

namespace App\Domain\Movie\Dto;

/**
 * Description of CreateMovieDto
 *
 * @author Alisher Kalimoldayev <kalimoldayev02@gmail.com>
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