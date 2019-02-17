<?php

namespace Argentum88\OOP\Geo\GeoInfo;

function createGeoInfo($city, $country)
{
    return function () use ($city, $country) {
        return [$city, $country];
    };
}

function getCity($geoInfo)
{
    return $geoInfo()[0];
}

function getCountry($geoInfo)
{
    return $geoInfo()[1];
}
