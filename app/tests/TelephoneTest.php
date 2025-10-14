<?php

namespace Course\Architecture\Tests;

use PHPUnit\Framework\TestCase;
use Course\Architecture\Telephone;

class TelephoneTest extends TestCase
{
    public function testTelephoneInInvalidFormatShouldNotExist()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Telephone('abc', '1234');
    }

    public function testTelephoneMustBeAbleToBeRepresentedAsAString()
    {
        $ddd = '12';
        $number = '21345678';
        $telephone = new Telephone($ddd, $number);
        $this->assertSame("({$ddd}) {$number}", (string) $telephone);
    }
}
