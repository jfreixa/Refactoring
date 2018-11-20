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

    public function daysRented(): int
    {
        return $this->daysRented;
    }

    public function charge()
    {
        return $this->movie->charge($this->daysRented);
    }

    public function frequentRenterPoints()
    {
        $frequentRenterPoints = 1;

        if (($this->movie()->priceCode() == Movie::NEW_RELEASE) &&
            $this->DaysRented() > 1) {
            $frequentRenterPoints++;
        }

        return $frequentRenterPoints;
    }

}
