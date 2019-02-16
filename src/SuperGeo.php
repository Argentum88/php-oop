<?php

namespace Argentum88\OOP;

use Exception;

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
     * @throws Exception
     */
    public function getInfo(string $ip): GeoInfoInterface
    {
        $this->validateIp($ip);

        return $this->ipToGeoService->getInfo($ip);
    }

    /**
     * @throws Exception
     */
    private function validateIp(string $ip): void
    {
        if ($ip == '') {
            return;
        }

        if (!filter_var($ip, FILTER_VALIDATE_IP)) {
            throw new Exception('Ip is invalid');
        }
    }
}
