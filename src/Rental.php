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
        $result = 0;
        switch ($this->movie()->priceCode()) {
            case Movie::REGULAR:
                $result += 2;
                if ($this->daysRented() > 2) {
                    $result += ($this->daysRented() - 2) * 1.5;
                }
                break;
            case Movie::NEW_RELEASE:
                $result += 3;
                break;
            case Movie::CHILDREN:
                $result += 1.5;
                if ($this->daysRented() > 3) {
                    $result += ($this->daysRented() - 1) * 1.5;
                }
                break;
        }

        return $result;
    }
}
