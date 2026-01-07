<?php

namespace Course\Architecture\Domain\Student;

interface PasswordEncrypt
{
    public function encrypt(string $password): string;
    public function verify(string $plainTextPassword, string $encryptedPassword): bool;
}
