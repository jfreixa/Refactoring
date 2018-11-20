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
        if ($daysRented > 1) {
            return 2;
        }

        return 1;
    }
}
