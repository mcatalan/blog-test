<?php

namespace App\Models;

use Illuminate\Contracts\Support\Arrayable;

class Address implements Arrayable
{
    public function __construct(
        private string $street,
        private string $suite,
        private string $city,
        private string $zipcode,
        private Coordinates $coordinates
    ) {}

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    public function getSuite(): string
    {
        return $this->suite;
    }

    public function setSuite(string $suite): void
    {
        $this->suite = $suite;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getZipcode(): string
    {
        return $this->zipcode;
    }

    public function setZipcode(string $zipcode): void
    {
        $this->zipcode = $zipcode;
    }

    public function getCoordinates(): Coordinates
    {
        return $this->coordinates;
    }

    public function setCoordinates(Coordinates $coordinates): void
    {
        $this->coordinates = $coordinates;
    }

    public function toArray(): array
    {
        return [
            "street" => $this->getStreet(),
            "suite" => $this->getSuite(),
            "city" => $this->getCity(),
            "zipcode" => $this->getZipcode(),
            "coordinates" => $this->getCoordinates(),
        ];
    }
}
