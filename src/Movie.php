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

    public function charge($daysRented)
    {
        $result = 0;
        switch ($this->priceCode()) {
            case Movie::REGULAR:
                $result += 2;
                if ($daysRented > 2) {
                    $result += ($daysRented - 2) * 1.5;
                }
                break;
            case Movie::NEW_RELEASE:
                $result += 3;
                break;
            case Movie::CHILDREN:
                $result += 1.5;
                if ($daysRented > 3) {
                    $result += ($daysRented - 1) * 1.5;
                }
                break;
        }

        return $result;
    }
}
