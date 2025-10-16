<?php

namespace Course\Architecture;

class Student
{
    private string $cpf;
    private string $name;
    private Email $mail;
    private array $telephones;

    public function __construct(Cpf $cpf, string $name, Email $email) {}

    public function addTelephone(string $ddd, string $number)
    {
        $this->telephones[] = new Telephone($ddd, $number);
    }
}
