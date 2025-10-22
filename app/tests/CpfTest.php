<?php

namespace Course\Architecture\Tests;

use PHPUnit\Framework\TestCase;
use Course\Architecture\Domain\Cpf;

class CpfTest extends TestCase
{
    public function testCpfInInvalidFormatShouldNotExist()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Cpf('12345678901');
    }

    public function testCpfMustBeAbleToBeRepresentedAsAString()
    {
        $number = '123.456.789-01';

        $cpf = new Cpf($number);
        $this->assertSame($number, (string) $cpf);
    }
}
