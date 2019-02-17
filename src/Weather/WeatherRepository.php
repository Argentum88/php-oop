<?php

namespace Argentum88\OOP\Weather;

class WeatherRepository implements RepositoryInterface
{
    private $weatherServices;

    public function __construct(array $weatherServices = [])
    {
        foreach ($weatherServices as $name => $weatherService) {
            $this->weatherServices[$name] = $weatherService;
        }
    }

    public function register(string $name, WeatherServiceInterface $weatherService)
    {
        $this->weatherServices[$name] = $weatherService;
    }

    public function find(string $serviceName): WeatherServiceInterface
    {
        return $this->weatherServices[$serviceName];
    }
}
