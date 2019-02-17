<?php

namespace Argentum88\OOP\Geo\GeoInfo;

use GuzzleHttp\Client;

function createHttpClient($base_uri)
{
    $client = new Client(['base_uri' => $base_uri]);

    return function ($method, $url) use ($client) {
        $response = $client->request($method, $url);

        return json_decode($response->getBody()->getContents(), true);
    };
}