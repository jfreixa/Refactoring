<?php

namespace Tests;

final class StatementBuilder
{
    /** @var array */
    private $movies;
    /** @var string */
    private $customerName;
    /** @var float */
    private $totalAmount;
    /** @var int */
    private $frequentRenterPoints;

    public function __construct()
    {
        $this->movies = [];
    }

    public function customerName(string $customerName): self
    {
        $this->customerName = $customerName;

        return $this;
    }

    public function movie(string $movieName, float $amount)
    {
        $this->movies[] = [
            'name' => $movieName,
            'amount' => $amount,
        ];

        return $this;
    }

    public function totalAmount(float $totalAmount)
    {
        $this->totalAmount = $totalAmount;

        return $this;
    }

    public function frequentRenterPoints(int $frequentRenterPoints)
    {
        $this->frequentRenterPoints = $frequentRenterPoints;

        return $this;
    }

    public function build(): string
    {
        $result = "Rental Record for ".$this->customerName."\n";

        foreach ($this->movies as $movie) {
            $result .= "\t".$movie['name']."\t".$movie['amount']."\n";
        }

        $result .= "Amount owed is ".$this->totalAmount."\n";
        $result .= "You earned ".$this->frequentRenterPoints." frequent renter points";

        return $result;
    }
}
