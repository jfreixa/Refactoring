<?php

namespace Tests;

use Refactoring\Movie;
use Refactoring\Rental;

final class RentalBuilder
{
    /** @var Movie */
    private $movie;
    /** @var int */
    private $daysRented;

    public function movie(Movie $movie): self
    {
        $this->movie = $movie;

        return $this;
    }

    public function daysRented(int $daysRented): self
    {
        $this->daysRented = $daysRented;

        return $this;
    }

    public function build(): Rental
    {
        return new Rental($this->movie, $this->daysRented);
    }
}
