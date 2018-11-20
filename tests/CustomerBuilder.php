<?php

namespace Tests;

use Refactoring\Customer;
use Refactoring\Rental;

final class CustomerBuilder
{
    /** @var Rental[] */
    private $rentals;
    /** @var string */
    private $name;

    public function __construct()
    {
        $this->rentals = [];
    }

    public function name(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function rental(Rental $rental): self
    {
        $this->rentals[] = $rental;

        return $this;
    }

    public function build(): Customer
    {
        $customer = new Customer($this->name);
        foreach ($this->rentals as $rental) {
            $customer->addRental($rental);
        }

        return $customer;
    }
}
