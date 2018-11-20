<?php

namespace Refactoring;

class Movie
{
    /** @var string */
    private $title;
    /** @var Price */
    private $price;

    public function __construct(string $title, Price $price)
    {
        $this->title = $title;
        $this->price =  $price;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function charge($daysRented)
    {
        return $this->price->charge($daysRented);
    }

    public function frequentRenterPoints($daysRented)
    {
        return $this->price->frequentRenterPoints($daysRented);
    }
}
