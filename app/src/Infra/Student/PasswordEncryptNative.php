<?php

namespace Course\Architecture\Infra\Student;

use Course\Architecture\Domain\Student\PasswordEncrypt;

class PasswordEncryptNative implements PasswordEncrypt
{
    public function encrypt(string $password): string
    {
        return password_hash($password, PASSWORD_ARGON2ID);
    }

    public function verify(string $plainTextPassword, string $encryptedPassword): bool
    {
        return password_verify($plainTextPassword, $encryptedPassword);
    }
}
