<?php

namespace Argentum88\OOP\Tests;

use Argentum88\OOP\IpToGeo\IpApiCom;
use Argentum88\OOP\SuperGeo;
use PHPUnit\Framework\TestCase;

class SuperGeoTest extends TestCase
{
    public function testGetInfo()
    {
        $geoService = new IpApiCom();
        $superGeo = new SuperGeo($geoService);
        $this->assertIsObject($superGeo->getInfo(''));
    }
}
