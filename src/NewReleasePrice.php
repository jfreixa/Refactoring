<?php

namespace Refactoring;

final class NewReleasePrice implements Price
{
    public function priceCode()
    {
        return Movie::NEW_RELEASE;
    }
}
