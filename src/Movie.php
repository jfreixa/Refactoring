<?php

namespace Refactoring;

class Movie
{
    const REGULAR = 0;
    const NEW_RELEASE = 1;
    const CHILDREN = 2;

    /** @var string */
    private $title;
    /** @var Price */
    private $price;

    public function __construct(string $title, int $priceCode)
    {
        $this->title = $title;
        $this->setPriceCode($priceCode);
    }

    public function title(): string
    {
        return $this->title;
    }

    public function setPriceCode(int $price): void
    {
        switch ($price) {
            case Movie::REGULAR:
                $this->price = new RegularPrice();
                break;
            case Movie::NEW_RELEASE:
                $this->price = new NewReleasePrice();
                break;
            case Movie::CHILDREN:
                $this->price = new ChildrenPrice();
                break;
        }
    }

    public function priceCode(): int
    {
        return $this->price->priceCode();
    }

    public function charge($daysRented)
    {
        return $this->price->charge($daysRented);
    }

    public function frequentRenterPoints($daysRented)
    {
        $frequentRenterPoints = 1;

        if (($this->priceCode() == Movie::NEW_RELEASE) && $daysRented > 1) {
            $frequentRenterPoints++;
        }

        return $frequentRenterPoints;
    }


}
