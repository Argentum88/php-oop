<?php

namespace Argentum88\OOP\Tests;

use Argentum88\OOP\GeoInfoInterface;
use Argentum88\OOP\IpToGeo\IpApiCom;
use Argentum88\OOP\SuperGeo;
use PHPUnit\Framework\TestCase;

class SuperGeoTest extends TestCase
{
    public function testGetInfo()
    {
        //тут нужен двойник
        $geoService = new IpApiCom();
        $superGeo = new SuperGeo($geoService);

        $this->assertInstanceOf(GeoInfoInterface::class ,$superGeo->getInfo(''));
        $this->assertInstanceOf(GeoInfoInterface::class ,$superGeo->getInfo('8.8.8.8'));
    }
}
