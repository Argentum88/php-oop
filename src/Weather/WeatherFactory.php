<?php

namespace Argentum88\OOP\Weather;

class WeatherFactory
{
    private $weatherRepository;

    public function __construct(RepositoryInterface $weatherRepository)
    {
        $this->weatherRepository = $weatherRepository;
    }

    public function build(string $serviceName): Weather
    {
        $weatherService = $this->weatherRepository->find($serviceName);

        return new Weather($weatherService);
    }
}
