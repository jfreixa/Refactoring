<?php

namespace Refactoring;

final class ChildrenPrice implements Price
{
    public function priceCode()
    {
        return Movie::CHILDREN;
    }

    public function charge($daysRented)
    {
        $result = 1.5;
        if ($daysRented > 3) {
            $result += ($daysRented - 1) * 1.5;
        }

        return $result;
    }

    public function frequentRenterPoints($daysRented)
    {
        return 1;
    }
}
