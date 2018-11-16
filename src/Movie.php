<?php

namespace Refactoring;

class Movie
{
    const REGULAR = 0;
    const NEW_RELEASE = 1;
    const CHILDREN = 2;

    /** @var string */
    private $title;
    /** @var int */
    private $priceCode;

    public function __construct(string $title, int $priceCode)
    {
        $this->title = $title;
        $this->priceCode = $priceCode;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function setPriceCode(int $priceCode): void
    {
        $this->priceCode = $priceCode;
    }

    public function priceCode(): int
    {
        return $this->priceCode;
    }
}
