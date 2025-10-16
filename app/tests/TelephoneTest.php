<?php

namespace Course\Architecture\Tests;

use PHPUnit\Framework\TestCase;
use Course\Architecture\Telephone;

class TelephoneTest extends TestCase
{
    public function testTelephoneWithNumberInInvalidFormatShouldNotExist()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid phone number');
        new Telephone('12', '1234');
    }

    public function testTelephoneWithDddInInvalidFormatShouldNotExist()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid ddd');
        new Telephone('123', '12345678');
    }

    public function testTelephoneMustBeAbleToBeRepresentedAsAString()
    {
        $ddd = '12';
        $number = '21345678';
        $telephone = new Telephone($ddd, $number);
        $this->assertSame("({$ddd}) {$number}", (string) $telephone);
    }
}
