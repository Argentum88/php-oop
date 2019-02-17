<?php

namespace Argentum88\OOP\Weather;

class SuperWeatherFactory
{
    private $weatherRepository;

    public function __construct(RepositoryInterface $weatherRepository)
    {
        $this->weatherRepository = $weatherRepository;
    }

    public function build(string $serviceName): SuperWeather
    {
        $weatherService = $this->weatherRepository->find($serviceName);

        return new SuperWeather($weatherService);
    }
}
