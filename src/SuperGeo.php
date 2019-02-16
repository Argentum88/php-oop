<?php

namespace Argentum88\OOP;

class SuperGeo
{
    /**
     * @var IpToGeoInterface
     */
    private $ipToGeoService;

    public function __construct(IpToGeoInterface $ipToGeoService)
    {
        $this->ipToGeoService = $ipToGeoService;
    }

    public function getInfo(string $ip): GeoInfoInterface
    {
        return $this->ipToGeoService->getInfo($this->validateIp($ip));
    }

    private function validateIp(string $ip): string
    {
        return $ip;
    }
}
