<?php 

namespace Argentum88\OOP;

use GuzzleHttp\Client;

class IpToGeoInformer
{
    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getInfo(string $ip)
    {
        $response = $this->client->request('GET', '/json/'.$ip);
        return json_decode($response->getBody()->getContents(), true);
    }
}