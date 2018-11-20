<?php

namespace Refactoring;

final class ChildrenPrice implements Price
{
    public function priceCode()
    {
        return Movie::CHILDREN;
    }
}
