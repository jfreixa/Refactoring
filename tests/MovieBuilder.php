<?php

namespace Tests;

use Refactoring\Movie;

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

    public function priceCode(int $priceCode): self
    {
        $this->priceCode = $priceCode;

        return $this;
    }

    public function build(): Movie
    {
        return new Movie($this->title, $this->priceCode);
    }
}
