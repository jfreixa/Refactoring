<?php

namespace Refactoring;

class Customer
{
    /** @var string */
    private $name;
    /** @var Rental[] */
    private $rentals = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function addRental(Rental $rental)
    {
        $this->rentals[] = $rental;
    }

    public function statement(): string
    {
        $result = "Rental Record for ".$this->name()."\n";
        foreach ($this->rentals as $rental) {
            $result .= "\t".$rental->movie()->title()."\t".$rental->charge()."\n";
        }

        $result .= "Amount owed is ".$this->totalAmount()."\n";
        $result .= "You earned ".$this->frequentRenterPoints()." frequent renter points";

        return $result;
    }

    private function totalAmount()
    {
        $totalAmount = 0;
        foreach ($this->rentals as $rental) {
            $totalAmount += $rental->charge();
        }

        return $totalAmount;
    }

    private function frequentRenterPoints()
    {
        $frequentRenterPoints = 0;
        foreach ($this->rentals as $rental) {
            $frequentRenterPoints += $rental->frequentRenterPoints();
        }

        return $frequentRenterPoints;
    }
}
