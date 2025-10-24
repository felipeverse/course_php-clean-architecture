<?php

namespace Course\Architecture\Domain\Student;

use Course\Architecture\Domain\Cpf;

interface StudentRepository
{
    public function add(Student $student): void;
    public function getByCpf(Cpf $cpf): Student;
    /** @return Student[] */
    public function all(): array;
}
