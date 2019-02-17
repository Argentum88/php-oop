<?php

namespace Argentum88\OOP\Weather;


interface RepositoryInterface
{
    public function register(WeatherServiceInterface $weatherService);

    public function find($serviceName): WeatherServiceInterface;
}