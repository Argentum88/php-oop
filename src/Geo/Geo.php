<?php

namespace Argentum88\OOP\Geo;

use function Argentum88\OOP\Geo\GeoInfo\createGeoInfo;

function createGeo($httpClient)
{
    return function($ip) use ($httpClient) {

        $data = $httpClient('http://ip-api.com', 'GET', '/json/' . $ip);
        if (!is_array($data) || !array_key_exists('city', $data) || !array_key_exists('country', $data)) {
            throw new \Exception('Internal error');
        }

        return createGeoInfo($data['city'], $data['country']);
    };
}
