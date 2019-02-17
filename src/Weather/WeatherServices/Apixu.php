<?php

namespace Argentum88\OOP\Weather\WeatherServices;

use Argentum88\OOP\Weather\WeatherInfo\WeatherInfo;
use Argentum88\OOP\Weather\WeatherInfoInterface;
use Argentum88\OOP\Weather\WeatherServiceInterface;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Apixu implements WeatherServiceInterface
{
    /** @var Client */
    private $client;

    /** @var string */
    private $apiKey;

    public function __construct(string $apiKey = '')
    {
        $this->client = new Client(['base_uri' => 'http://api.apixu.com/v1/']);
        $this->apiKey = 'd07242607cd64efb81622523191702';
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function getInfo(string $city): WeatherInfoInterface
    {
        $response = $this->client->request('GET', "current.json?key={$this->apiKey}&q=$city");
        $data = json_decode($response->getBody()->getContents(), true);

        if (!is_array($data) || !array_key_exists('current', $data)) {
            throw new Exception('Internal error');
        }

        return new WeatherInfo($data['current']['temp_c']);
    }
}
