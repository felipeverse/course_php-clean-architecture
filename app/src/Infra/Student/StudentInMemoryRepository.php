<?php

namespace Course\Architecture\Infra\Student;

use Course\Architecture\Domain\Cpf;
use Course\Architecture\Domain\Student\Student;
use Course\Architecture\Domain\Student\StudentNotFoundExpcetion;
use Course\Architecture\Domain\Student\StudentRepositoryInterface;


class StudentInMemoryRepository implements StudentRepositoryInterface
{
    /** @var Student[] */
    private array $students = [];

    public function add(Student $student): void
    {
        $this->students[] = $student;
    }

    public function getByCpf(Cpf $cpf): Student
    {
        $filteredStudents = array_filter($this->students, fn (Student $student) => $student->cpf === $cpf);
        
        if (count($filteredStudents) === 0) {
            throw new StudentNotFoundExpcetion('Student with $cpf cpf not found');
        }

        return array_first($filteredStudents);
    }

    public function getAll(): array
    {
        return $this->students;
    }
}
