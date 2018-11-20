<?php

namespace Refactoring;

interface Price
{
    public function priceCode();

    public function charge($daysRented);

    public function frequentRenterPoints($daysRented);
}
