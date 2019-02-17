<?php

namespace Argentum88\OOP\Weather;

class Weather
{
    /**
     * @var WeatherServiceInterface
     */
    private $weatherService;

    public function __construct(WeatherServiceInterface $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function getInfo(string $city): WeatherInfoInterface
    {
        return $this->weatherService->getInfo($city);
    }
}
