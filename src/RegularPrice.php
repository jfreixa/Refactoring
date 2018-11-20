<?php

namespace Refactoring;

final class RegularPrice implements Price
{
    public function priceCode()
    {
        return Movie::REGULAR;
    }
}
