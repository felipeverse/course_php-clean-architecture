<?php

namespace course\Architecture\Tests;

use Course\Architecture\Email;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function testEmailInInvalidFormatShouldNotExist()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Email('Invalid email');
    }

    public function testEmailMusBeAbleToBeRepresentedAsAString()
    {
        $address = 'endereco@example.com';
        $email = new Email($address);
        $this->assertSame($address, (string) $email);
    }
}
