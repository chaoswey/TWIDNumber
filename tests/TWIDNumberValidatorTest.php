<?php

namespace Chaoswey\Tests;

use Chaoswey\TWIDNumber\TWIDNumberGenerator;
use Chaoswey\TWIDNumber\TWIDNumberValidator;
use PHPUnit\Framework\TestCase;

class TWIDNumberValidatorTest extends TestCase
{
    public function testTWIDNumberValidator()
    {
        $idNumber = (new TWIDNumberGenerator())->generate();
        $this->assertTrue((new TWIDNumberValidator())->valid($idNumber));
    }
}