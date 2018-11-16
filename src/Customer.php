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
            $thisAmount = 0;
            switch ($each->movie()->priceCode()) {
                case Movie::REGULAR:
                    $thisAmount += 2;
                    if ($each->daysRented() > 2) {
                        $thisAmount += ($each->daysRented() - 2) * 1.5;
                    }
                    break;
                case Movie::NEW_RELEASE:
                    $thisAmount += 3;
                    break;
                case Movie::CHILDREN:
                    $thisAmount += 1.5;
                    if ($each->daysRented() > 3) {
                        $thisAmount += ($each->daysRented() - 1) * 1.5;
                    }
                    break;
            }

            // add frequent renter points
            $frequentRenterPoints++;

            // add bonus for a two day new release rental
            if (($each->movie()->priceCode() == Movie::NEW_RELEASE) &&
                $each->DaysRented() > 1) {
                $frequentRenterPoints++;
            }
            // show figures for this rental
            $result .= "\t".$each->movie()->title()."\t".$thisAmount."\n";
            $totalAmount += $thisAmount;
        }

        $result .= "Amount owed is ".$totalAmount."\n";
        $result .= "You earned ".$frequentRenterPoints." frequent renter points";

        return $result;
    }
}
