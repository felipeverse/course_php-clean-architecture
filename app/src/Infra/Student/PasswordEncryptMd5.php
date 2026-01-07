<?php

namespace Course\Architecture\Infra\Student;

use Course\Architecture\Domain\Student\PasswordEncrypt;

class PasswordEncryptMd5 implements PasswordEncrypt
{
    public function encrypt(string $password): string
    {
        return md5($password);
    }

    public function verify(string $plainTextPassword, string $encryptedPassword): bool
    {
        return md5($plainTextPassword) === $encryptedPassword;
    }
}
