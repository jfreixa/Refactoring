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
            $thisAmount = $this->amountFor($each);

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

    private function amountFor(Rental $rental)
    {
        $result = 0;
        switch ($rental->movie()->priceCode()) {
            case Movie::REGULAR:
                $result += 2;
                if ($rental->daysRented() > 2) {
                    $result += ($rental->daysRented() - 2) * 1.5;
                }
                break;
            case Movie::NEW_RELEASE:
                $result += 3;
                break;
            case Movie::CHILDREN:
                $result += 1.5;
                if ($rental->daysRented() > 3) {
                    $result += ($rental->daysRented() - 1) * 1.5;
                }
                break;
        }

        return $result;
    }
}
