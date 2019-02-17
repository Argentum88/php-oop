<?php

namespace Argentum88\OOP\Geo;

use function Argentum88\OOP\Geo\GeoInfo\createGeoInfo;

function getGeoInfo($http, $ip)
{
    $data = $http('GET', '/json/' . $ip);
    if (!is_array($data) || !array_key_exists('city', $data) || !array_key_exists('country', $data)) {
        throw new \Exception('Internal error');
    }

    return createGeoInfo($data['city'], $data['country']);
}