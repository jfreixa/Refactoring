<?php

namespace Refactoring;

final class NewReleasePrice implements Price
{
    public function charge($daysRented)
    {
        return 3;
    }

    public function frequentRenterPoints($daysRented)
    {
        $frequentRenterPoints = 1;

        if ($daysRented > 1) {
            $frequentRenterPoints++;
        }

        return $frequentRenterPoints;
    }
}
