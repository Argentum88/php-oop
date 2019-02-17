<?php

namespace Argentum88\OOP\Weather\WeatherServices;

use Argentum88\OOP\Weather\WeatherInfo\WeatherInfo;
use Argentum88\OOP\Weather\WeatherInfoInterface;
use Argentum88\OOP\Weather\WeatherServiceInterface;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Weatherbit implements WeatherServiceInterface
{
    /** @var Client */
    private $client;

    /** @var string */
    private $apiKey;

    public function __construct(string $apiKey)
    {
        $this->client = new Client(['base_uri' => 'https://api.weatherbit.io/v2.0/']);
        $this->apiKey = $apiKey;
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function getInfo(string $city): WeatherInfoInterface
    {
        $response = $this->client->request('GET', "current?key={$this->apiKey}&city=$city");
        $data = json_decode($response->getBody()->getContents(), true);

        if (!is_array($data) || !array_key_exists('data', $data)) {
            throw new Exception('Internal error');
        }

        return new WeatherInfo($data['data'][0]['temp']);
    }
}
