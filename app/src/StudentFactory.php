<?php

namespace Course\Architecture;

use Exception;

class StudentFactory
{
    private Student $student;

    public function withNameCpfEmail(string $name, string $cpfNumber, string $emailAddress): self
    {
        $this->student = new Student(
            $name,
            new Cpf($cpfNumber),
            new Email($emailAddress)
        );
        return $this;
    }

    public function addTelephone(string $telephoneDdd, string $telephoneNumber): self
    {
        if (!$this->student) {
            new Exception('Calling the method to add a phone number before calling the method withNameCpfEmail');
        }

        $this->student->addTelephone($telephoneDdd, $telephoneNumber);

        return $this;
    }

    public function student(): Student
    {
        if (!$this->student) {
            new Exception('Calling the method to get a student before calling the method withNameCpfEmail');
        }

        return $this->student;
    }
}
