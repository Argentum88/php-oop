<?php

namespace Argentum88\OOP;

use Argentum88\OOP\GeoInfo\GeoInfo;

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
        if ($this->ipIsValid($ip)) {
            $info = $this->ipToGeoService->getInfo($ip);

            if ($this->infoIsValid($info)) {
                return new GeoInfo($info['city'], $info['country']);
            }
        }

        throw new \Exception('Error');
    }

    private function ipIsValid(string $ip): bool
    {
        return true;
    }

    private function infoIsValid(array $info): bool
    {
        return true;
    }
}
