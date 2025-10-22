<?php

namespace Course\Architecture;

class Student
{
    private string $cpf;
    private string $name;
    private Email $email;
    private array $telephones;

    public static function withNameCpfEmail(string $name, string $cpfNumber, string $emailAddress): self
    {
        return new self(
            $name,
            new Cpf($cpfNumber),
            new Email($emailAddress)
        );
    }

    public function __construct(string $name, Cpf $cpf, Email $email)
    {
        $this->name = $name;
        $this->cpf = $cpf;
        $this->email = $email;
    }

    public function addTelephone(string $ddd, string $number): self
    {
        $this->telephones[] = new Telephone($ddd, $number);
        return $this;
    }
}
