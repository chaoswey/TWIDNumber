<?php namespace Chaoswey\Tests;

use Chaoswey\TWIDNumber\TWIDNumberGenerator;
use Chaoswey\TWIDNumber\TWIDNumberValidator;
use PHPUnit\Framework\TestCase;

class TWIDNumberGeneratorTest extends TestCase
{
    public function testTWIDNumberGenerator()
    {
        $idNumber = (new TWIDNumberGenerator())->generate();
        $this->assertEquals(10, strlen($idNumber));

        $valid = new TWIDNumberValidator();
        $this->assertTrue($valid->valid($idNumber));
    }
}