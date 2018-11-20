<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Refactoring\Movie;

final class CustomerTest extends TestCase
{
    const CUSTOMER_NAME = "customerName";
    const MOVIE_NAME = "movieName";

    /** @test */
    public function withoutRentalsTest()
    {
        $customer = (new CustomerBuilder())->name(self::CUSTOMER_NAME)->build();

        $expected = (new StatementBuilder())
            ->customerName(self::CUSTOMER_NAME)
            ->totalAmount(0)
            ->frequentRenterPoints(0)
            ->build();

        $this->assertEquals($expected, $customer->statement());
    }

    /** @test */
    public function regularRental1DayTest()
    {
        $movie = (new MovieBuilder())
            ->title(self::MOVIE_NAME)
            ->priceCode(Movie::REGULAR)
            ->build();
        $rental = (new RentalBuilder())
            ->movie($movie)
            ->daysRented(1)
            ->build();
        $customer = (new CustomerBuilder())
            ->name(self::CUSTOMER_NAME)
            ->rental($rental)
            ->build();

        $expected = (new StatementBuilder())
            ->customerName(self::CUSTOMER_NAME)
            ->movie(self::MOVIE_NAME, 2)
            ->totalAmount(2)
            ->frequentRenterPoints(1)
            ->build();

        $this->assertEquals($expected, $customer->statement());
    }

    /** @test */
    public function regularRental2DayTest()
    {
        $movie = (new MovieBuilder())
            ->title(self::MOVIE_NAME)
            ->priceCode(Movie::REGULAR)
            ->build();
        $rental = (new RentalBuilder())
            ->movie($movie)
            ->daysRented(2)
            ->build();
        $customer = (new CustomerBuilder())
            ->name(self::CUSTOMER_NAME)
            ->rental($rental)
            ->build();

        $expected = (new StatementBuilder())
            ->customerName(self::CUSTOMER_NAME)
            ->movie(self::MOVIE_NAME, 2)
            ->totalAmount(2)
            ->frequentRenterPoints(1)
            ->build();

        $this->assertEquals($expected, $customer->statement());
    }

    /** @test */
    public function regularRental3DayTest()
    {
        $movie = (new MovieBuilder())
            ->title(self::MOVIE_NAME)
            ->priceCode(Movie::REGULAR)
            ->build();
        $rental = (new RentalBuilder())
            ->movie($movie)
            ->daysRented(3)
            ->build();
        $customer = (new CustomerBuilder())
            ->name(self::CUSTOMER_NAME)
            ->rental($rental)
            ->build();

        $expected = (new StatementBuilder())
            ->customerName(self::CUSTOMER_NAME)
            ->movie(self::MOVIE_NAME, 3.5)
            ->totalAmount(3.5)
            ->frequentRenterPoints(1)
            ->build();

        $this->assertEquals($expected, $customer->statement());
    }

    /** @test */
    public function newReleaseRental1DayTest()
    {
        $movie = (new MovieBuilder())
            ->title(self::MOVIE_NAME)
            ->priceCode(Movie::NEW_RELEASE)
            ->build();
        $rental = (new RentalBuilder())
            ->movie($movie)
            ->daysRented(1)
            ->build();
        $customer = (new CustomerBuilder())
            ->name(self::CUSTOMER_NAME)
            ->rental($rental)
            ->build();

        $expected = (new StatementBuilder())
            ->customerName(self::CUSTOMER_NAME)
            ->movie(self::MOVIE_NAME, 3)
            ->totalAmount(3)
            ->frequentRenterPoints(1)
            ->build();

        $this->assertEquals($expected, $customer->statement());
    }

    /** @test */
    public function newReleaseRental2DayTest()
    {
        $movie = (new MovieBuilder())
            ->title(self::MOVIE_NAME)
            ->priceCode(Movie::NEW_RELEASE)
            ->build();
        $rental = (new RentalBuilder())
            ->movie($movie)
            ->daysRented(2)
            ->build();
        $customer = (new CustomerBuilder())
            ->name(self::CUSTOMER_NAME)
            ->rental($rental)
            ->build();

        $expected = (new StatementBuilder())
            ->customerName(self::CUSTOMER_NAME)
            ->movie(self::MOVIE_NAME, 3)
            ->totalAmount(3)
            ->frequentRenterPoints(2)
            ->build();

        $this->assertEquals($expected, $customer->statement());
    }

    /** @test */
    public function newReleaseRental3DayTest()
    {
        $movie = (new MovieBuilder())
            ->title(self::MOVIE_NAME)
            ->priceCode(Movie::NEW_RELEASE)
            ->build();
        $rental = (new RentalBuilder())
            ->movie($movie)
            ->daysRented(3)
            ->build();
        $customer = (new CustomerBuilder())
            ->name(self::CUSTOMER_NAME)
            ->rental($rental)
            ->build();

        $expected = (new StatementBuilder())
            ->customerName(self::CUSTOMER_NAME)
            ->movie(self::MOVIE_NAME, 3)
            ->totalAmount(3)
            ->frequentRenterPoints(2)
            ->build();

        $this->assertEquals($expected, $customer->statement());
    }

    /** @test */
    public function childrenRental1DayTest()
    {
        $movie = (new MovieBuilder())
            ->title(self::MOVIE_NAME)
            ->priceCode(Movie::CHILDREN)
            ->build();
        $rental = (new RentalBuilder())
            ->movie($movie)
            ->daysRented(1)
            ->build();
        $customer = (new CustomerBuilder())
            ->name(self::CUSTOMER_NAME)
            ->rental($rental)
            ->build();

        $expected = (new StatementBuilder())
            ->customerName(self::CUSTOMER_NAME)
            ->movie(self::MOVIE_NAME, 1.5)
            ->totalAmount(1.5)
            ->frequentRenterPoints(1)
            ->build();

        $this->assertEquals($expected, $customer->statement());
    }

    /** @test */
    public function childrenRental3DayTest()
    {
        $movie = (new MovieBuilder())
            ->title(self::MOVIE_NAME)
            ->priceCode(Movie::CHILDREN)
            ->build();
        $rental = (new RentalBuilder())
            ->movie($movie)
            ->daysRented(3)
            ->build();
        $customer = (new CustomerBuilder())
            ->name(self::CUSTOMER_NAME)
            ->rental($rental)
            ->build();

        $expected = (new StatementBuilder())
            ->customerName(self::CUSTOMER_NAME)
            ->movie(self::MOVIE_NAME, 1.5)
            ->totalAmount(1.5)
            ->frequentRenterPoints(1)
            ->build();

        $this->assertEquals($expected, $customer->statement());
    }

    /** @test */
    public function childrenRental4DayTest()
    {
        $movie = (new MovieBuilder())
            ->title(self::MOVIE_NAME)
            ->priceCode(Movie::CHILDREN)
            ->build();
        $rental = (new RentalBuilder())
            ->movie($movie)
            ->daysRented(4)
            ->build();
        $customer = (new CustomerBuilder())
            ->name(self::CUSTOMER_NAME)
            ->rental($rental)
            ->build();

        $expected = (new StatementBuilder())
            ->customerName(self::CUSTOMER_NAME)
            ->movie(self::MOVIE_NAME, 6)
            ->totalAmount(6)
            ->frequentRenterPoints(1)
            ->build();

        $this->assertEquals($expected, $customer->statement());
    }

    /** @test */
    public function rentalTest()
    {
        $regularMovieName = "regularMovieName";
        $regularMovie = (new MovieBuilder())
            ->title($regularMovieName)
            ->priceCode(Movie::REGULAR)
            ->build();
        $regularRental = (new RentalBuilder())
            ->movie($regularMovie)
            ->daysRented(10)
            ->build();

        $newReleaseMovieName = "newReleaseMovieName";
        $newReleaseMovie = (new MovieBuilder())
            ->title($newReleaseMovieName)
            ->priceCode(Movie::NEW_RELEASE)
            ->build();
        $newReleaseRental = (new RentalBuilder())
            ->movie($newReleaseMovie)
            ->daysRented(10)
            ->build();

        $childrenMovieName = "childrenMovieName";
        $childrenMovie = (new MovieBuilder())
            ->title($childrenMovieName)
            ->priceCode(Movie::CHILDREN)
            ->build();
        $childrenRental = (new RentalBuilder())
            ->movie($childrenMovie)
            ->daysRented(10)
            ->build();

        $customer = (new CustomerBuilder())
            ->name(self::CUSTOMER_NAME)
            ->rental($regularRental)
            ->rental($newReleaseRental)
            ->rental($childrenRental)
            ->build();

        $expected = (new StatementBuilder())
            ->customerName(self::CUSTOMER_NAME)
            ->movie($regularMovieName, 14)
            ->movie($newReleaseMovieName, 3)
            ->movie($childrenMovieName, 15)
            ->totalAmount(32)
            ->frequentRenterPoints(4)
            ->build();

        $this->assertEquals($expected, $customer->statement());
    }
}
