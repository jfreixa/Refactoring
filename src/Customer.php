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
        $totalAmount = 0;
        $frequentRenterPoints = 0;
        $result = "Rental Record for ".$this->name()."\n";
        foreach ($this->rentals as $each) {
            $frequentRenterPoints++;

            if (($each->movie()->priceCode() == Movie::NEW_RELEASE) &&
                $each->DaysRented() > 1) {
                $frequentRenterPoints++;
            }
            $result .= "\t".$each->movie()->title()."\t".$each->charge()."\n";
            $totalAmount += $each->charge();
        }

        $result .= "Amount owed is ".$totalAmount."\n";
        $result .= "You earned ".$frequentRenterPoints." frequent renter points";

        return $result;
    }

}
