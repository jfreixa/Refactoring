<?php

namespace Tests;

use Refactoring\Movie;
use Refactoring\Price;

final class MovieBuilder
{
    /** @var string */
    private $title;
    /** @var int */
    private $priceCode;

    public function title(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function price(Price $price): self
    {
        $this->priceCode = $price->priceCode();

        return $this;
    }

    public function build(): Movie
    {
        return new Movie($this->title, $this->priceCode);
    }
}
