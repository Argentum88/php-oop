<?php

namespace Argentum88\OOP\Geo;

interface IpToGeoInterface
{
    public function getInfo(string $ip): GeoInfoInterface;
}
