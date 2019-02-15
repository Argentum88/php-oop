<?php

namespace Argentum88\OOP\Tests;

use Argentum88\OOP\IpToGeoInformer;
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class IpToGeoInformerTest extends TestCase
{
    /**
     * @var IpToGeoInformer
     */
    private $ipToGeoInformer;

    public function setUp(): void
    {
        $client = new Client(['base_uri' => 'http://ip-api.com']);
        $this->ipToGeoInformer = new IpToGeoInformer($client);
    }

    public function testGetInfo()
    {
        $this->assertIsArray($this->ipToGeoInformer->getInfo(''));
    }
}
