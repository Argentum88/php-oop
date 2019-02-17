<?php

namespace Argentum88\OOP\Weather;

use Exception;

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
        if (!array_key_exists($serviceName, $this->weatherServices)) {
            throw new Exception('No such service');
        }

        return $this->weatherServices[$serviceName];
    }
}
