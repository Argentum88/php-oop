<?php

namespace Argentum88\OOP\GeoInfo;

use Argentum88\OOP\GeoInfoInterface;

class GeoInfo implements GeoInfoInterface
{
    /** @var string */
    private $city;

    /** @var string */
    private $country;

    public function __construct(string $city, string $country)
    {
        $this->city = $city;
        $this->country = $country;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getCountry(): string
    {
        return $this->country;
    }
}
