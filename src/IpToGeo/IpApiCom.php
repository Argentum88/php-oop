<?php

namespace Argentum88\OOP\IpToGeo;

use Argentum88\OOP\GeoInfo\GeoInfo;
use Argentum88\OOP\GeoInfoInterface;
use Argentum88\OOP\IpToGeoInterface;
use GuzzleHttp\Client;

class IpApiCom implements IpToGeoInterface
{
    /** @var Client */
    private $client;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'http://ip-api.com']);
    }

    public function getInfo(string $ip): GeoInfoInterface
    {
        $response = $this->client->request('GET', '/json/'.$ip);
        $data = json_decode($response->getBody()->getContents(), true);

        return new GeoInfo($data['city'], $data['country']);
    }
}
