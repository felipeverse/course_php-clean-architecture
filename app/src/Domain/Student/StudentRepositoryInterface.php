<?php

namespace Course\Architecture\Domain\Student;

use Course\Architecture\Domain\Cpf;

interface StudentRepositoryInterface
{
    public function add(Student $student): void;
    public function getByCpf(Cpf $cpf): Student;
    /** @return Student[] */
    public function getAll(): array;
}
