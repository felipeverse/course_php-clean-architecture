<?php

namespace Course\Architecture;

class Student
{
    private string $cpf;
    private string $name;
    private Email $email;
    private array $telephones;

    public function __construct(string $name, Cpf $cpf, Email $email)
    {
        $this->name = $name;
        $this->cpf = $cpf;
        $this->email = $email;
    }

    public function addTelephone(string $ddd, string $number)
    {
        $this->telephones[] = new Telephone($ddd, $number);
    }
}
