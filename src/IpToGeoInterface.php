<?php

namespace Argentum88\OOP;

interface IpToGeoInterface
{
    public function getInfo(string $ip): array;
}
