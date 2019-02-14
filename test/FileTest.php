<?php

use Argentum88\OOP\File;
use PHPUnit\Framework\TestCase;

class FileTest extends TestCase
{
    public function testMethod()
    {
        $obj = new File();
        $this->assertEquals('Hello World', $obj->method());
    }
}
