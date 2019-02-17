<?php

namespace Argentum88\OOP\Weather;

class WeatherRepository implements RepositoryInterface
{
    private $weatherServices;

    /**
     * @param WeatherServiceInterface[] $weatherServices
     */
    public function __construct($weatherServices = [])
    {
        foreach ($weatherServices as $weatherService) {
            $this->weatherServices[get_class($weatherService)] = $weatherService;
        }
    }

    public function register(WeatherServiceInterface $weatherService)
    {
        $this->weatherServices[get_class($weatherService)] = $weatherService;
    }

    public function find($serviceName): WeatherServiceInterface
    {
        return $this->weatherServices[$serviceName];
    }
}
