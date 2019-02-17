<?php

namespace Argentum88\OOP\Tests\Geo;

use function Argentum88\OOP\Geo\createGeo;
use function Argentum88\OOP\Geo\GeoInfo\getCity;
use function Argentum88\OOP\Geo\GeoInfo\getCountry;
use function Argentum88\OOP\Geo\getGeoInfo;
use PHPUnit\Framework\TestCase;

class GeoTest extends TestCase
{
    public function testIpValidation()
    {
        $this->expectException(\Exception::class);

        $httpClient = function ($a, $b, $c) {
            return 'bad data';
        };

        $geo = createGeo($httpClient);
        $geo('8.8.8.8');
    }

    public function testGetInfo()
    {
        $httpClient = function ($a, $b, $c) {
            return ['city' => 'Mountain View', 'country' => 'United States'];
        };

        $geo = createGeo($httpClient);
        $info = $geo('8.8.8.8');
        $this->assertEquals('Mountain View', getCity($info));
        $this->assertEquals('United States', getCountry($info));
    }
}
