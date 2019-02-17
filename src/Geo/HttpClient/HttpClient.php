<?php

namespace Argentum88\OOP\Geo\GeoInfo;

use GuzzleHttp\Client;

function createHttpClient()
{
    return function ($baseUri, $method, $url) {
        $client = new Client(['base_uri' => $baseUri]);
        $response = $client->request($method, $url);

        return json_decode($response->getBody()->getContents(), true);
    };
}