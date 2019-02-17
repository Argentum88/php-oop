<?php

namespace Argentum88\OOP\Weather\WeatherInfo;

use Argentum88\OOP\Weather\WeatherInfoInterface;

class WeatherInfo implements WeatherInfoInterface
{
    /** @var string */
    private $temp;

    public function __construct(string $temp)
    {
        $this->temp = $temp;
    }

    public function getTemp(): string
    {
        return $this->temp;
    }
}
