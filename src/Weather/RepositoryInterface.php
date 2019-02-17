<?php

namespace Argentum88\OOP\Weather;


interface RepositoryInterface
{
    public function register(string $name, WeatherServiceInterface $weatherService);

    public function find(string $serviceName): WeatherServiceInterface;
}
