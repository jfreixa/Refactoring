<?php

namespace Refactoring;

interface Price
{
    public function charge($daysRented);

    public function frequentRenterPoints($daysRented);
}
