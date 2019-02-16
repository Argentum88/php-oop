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

    /**
     * @throws \Exception
     */
    public function getInfo(string $ip): GeoInfoInterface
    {
        $this->validateIp($ip);

        return $this->ipToGeoService->getInfo($ip);
    }

    /**
     * @throws \Exception
     */
    private function validateIp(string $ip)
    {
        return;
    }
}
