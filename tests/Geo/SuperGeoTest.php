<?php

namespace Argentum88\OOP\Tests\Geo;

use Argentum88\OOP\Geo\GeoInfo\GeoInfo;
use Argentum88\OOP\Geo\GeoInfoInterface;
use Argentum88\OOP\Geo\IpToGeoInterface;
use Argentum88\OOP\Geo\SuperGeo;
use PHPUnit\Framework\TestCase;

class SuperGeoTest extends TestCase
{
    /** @var SuperGeo */
    private $superGeo;

    public function setUp(): void
    {
        $stub = $this->createMock(IpToGeoInterface::class);
        $stub->method('getInfo')->willReturn(new GeoInfo('Mountain View', 'United States'));

        $this->superGeo = new SuperGeo($stub);
    }

    public function testIpValidation()
    {
        $this->expectException(\Exception::class);
        $this->superGeo->getInfo('Bad');
    }

    public function testGetInfo()
    {
        $this->assertEquals('Mountain View', $this->superGeo->getInfo('8.8.8.8')->getCity());
        $this->assertEquals('United States', $this->superGeo->getInfo('8.8.8.8')->getCountry());
    }
}
