<?php

namespace App\Domain\Movie\Entity;

/**
 * Description of Movie
 *
 * @author Alisher Kalimoldayev <kalimoldayev02@gmail.com>
 */
class Movie
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