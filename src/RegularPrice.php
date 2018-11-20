<?php

namespace Refactoring;

final class RegularPrice implements Price
{
    public function charge($daysRented)
    {
        $result = 2;
        if ($daysRented > 2) {
            $result += ($daysRented - 2) * 1.5;
        }

        return $result;
    }

    public function frequentRenterPoints($daysRented)
    {
        return 1;
    }
}
