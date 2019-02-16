<?php

namespace Argentum88\OOP\IpToGeo;

use Argentum88\OOP\IpToGeoInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class IpApiCom implements IpToGeoInterface
{
    /** @var Client */
    private $client;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'http://ip-api.com']);
    }

    /**
     * @throws GuzzleException
     */
    public function getInfo(string $ip): array
    {
        $response = $this->client->request('GET', '/json/' . $ip);
        $data = json_decode($response->getBody()->getContents(), true);

        return $data;
    }
}
