<?php

namespace Refactoring;

class Rental
{
    /** @var Movie */
    private $movie;
    /** @var int */
    private $daysRented;

    public function __construct(Movie $movie, int $daysRented)
    {
        $this->movie = $movie;
        $this->daysRented = $daysRented;
    }

    public function movie(): Movie
    {
        return $this->movie;
    }

    public function charge()
    {
        return $this->movie->charge($this->daysRented);
    }

    public function frequentRenterPoints()
    {
        return $this->movie->frequentRenterPoints($this->daysRented);
    }

}
