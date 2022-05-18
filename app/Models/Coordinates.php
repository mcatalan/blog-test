<?php

namespace App\Models;

use Illuminate\Contracts\Support\Arrayable;

class Coordinates implements Arrayable
{
    public function __construct(
        private float $lat,
        private float $lng
    ) {}

    public function getLat(): float
    {
        return $this->lat;
    }

    public function setLat(float $lat): void
    {
        $this->lat = $lat;
    }

    public function getLng(): float
    {
        return $this->lng;
    }

    public function setLng(float $lng): void
    {
        $this->lng = $lng;
    }

    public function toArray(): array
    {
        return [
            "lat" => $this->getLat(),
            "lng" => $this->getLng(),
        ];
    }
}
