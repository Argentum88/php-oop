<?php

namespace Argentum88\OOP\Tests;

use Argentum88\OOP\GeoInfo\GeoInfo;
use Argentum88\OOP\GeoInfoInterface;
use Argentum88\OOP\IpToGeoInterface;
use Argentum88\OOP\SuperGeo;
use PHPUnit\Framework\TestCase;

class SuperGeoTest extends TestCase
{
    /** @var SuperGeo */
    private $superGeo;

    public function setUp(): void
    {
        $stub = $this->createMock(IpToGeoInterface::class);
        $stub->method('getInfo')->willReturn(new GeoInfo('Foo', 'Bar'));

        $this->superGeo = new SuperGeo($stub);
    }

    public function testIpValidation()
    {
        $this->expectException(\Exception::class);
        $this->superGeo->getInfo('Bad');
    }

    public function testGetInfo()
    {
        $this->assertInstanceOf(GeoInfoInterface::class ,$this->superGeo->getInfo(''));
        $this->assertInstanceOf(GeoInfoInterface::class ,$this->superGeo->getInfo('8.8.8.8'));
    }
}
