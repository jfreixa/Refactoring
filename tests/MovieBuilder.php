<?php

namespace Tests;

use Refactoring\Movie;
use Refactoring\Price;

final class MovieBuilder
{
    /** @var string */
    private $title;
    /** @var Price */
    private $price;

    public function title(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function price(Price $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function build(): Movie
    {
        return new Movie($this->title, $this->price);
    }
}
