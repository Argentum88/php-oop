<?php

namespace Argentum88\OOP\IpToGeo;

use Argentum88\OOP\GeoInfo\GeoInfo;
use Argentum88\OOP\GeoInfoInterface;
use Argentum88\OOP\IpToGeoInterface;
use Exception;
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
     * @throws Exception
     */
    public function getInfo(string $ip): GeoInfoInterface
    {
        $response = $this->client->request('GET', '/json/' . $ip);
        $data = json_decode($response->getBody()->getContents(), true);

        if (!is_array($data) || !array_key_exists('city', $data) || !array_key_exists('country', $data)) {
            throw new Exception('Internal error');
        }

        return new GeoInfo($data['city'], $data['country']);
    }
}
