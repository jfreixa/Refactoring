<?php

namespace Refactoring;

final class NewReleasePrice implements Price
{
    public function priceCode()
    {
        return Movie::NEW_RELEASE;
    }

    public function charge($daysRented)
    {
        return 3;
    }
}
