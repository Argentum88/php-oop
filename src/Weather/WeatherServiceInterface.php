<?php

namespace Argentum88\OOP\Weather;

interface WeatherServiceInterface
{
    public function getInfo(string $city): WeatherInfoInterface;
}
