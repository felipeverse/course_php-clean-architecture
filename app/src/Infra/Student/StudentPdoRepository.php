<?php

namespace Alura\Architecture\Infra\Student;

use Course\Architecture\Domain\Cpf;
use Course\Architecture\Domain\Student\Student;
use Course\Architecture\Domain\Student\Telephone;
use Course\Architecture\Domain\Student\StudentNotFoundExpcetion;
use Course\Architecture\Domain\Student\StudentRepositoryInterface;

class StudentPdoRepository implements StudentRepositoryInterface
{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function add(Student $student): void
    {
        $sql = 'INSERT INTO students VALUES (:cpf, :name, :email);';
        $stmt = $this->connection->prepare($sql);

        $stmt->bindValue('cpf', $student->cpf());
        $stmt->bindValue('name', $student->name());
        $stmt->bindValue('email', $student->email());

        $stmt->execute();

        $telephoneSql = 'INSERT INTO telephones VALUES (:ddd, :number, :student_cpf);';
        $telephoneStmt = $this->connection->prepare($telephoneSql);
        $telephoneStmt->bindValue('student_cpf', $student->cpf());

        /** @var Telephone $telephone */
        foreach ($student->telephones() as $telephone) {
            $telephoneStmt->bindValue('ddd', $telephone->ddd());
            $telephoneStmt->bindValue('number', $telephone->number());

            $telephoneStmt->execute();
        }
    }
    public function getByCpf(Cpf $cpf): Student
    {
        $sql = '
            SELECT cpf, name, email, ddd, number AS telephone_number 
                FROM students
            LEFT JOIN telephones ON telephones.student_cpf = students.cpf
            WHERE students.cpf = ?
        ';

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, (string) $cpf);

        $stmt->execute();

        $studentData = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($studentData) === 0) {
            throw new StudentNotFoundExpcetion('Student with $cpf cpf not found');
        }

        return $this->studentMapping($studentData);
    }

    public function studentMapping(array $studentData): Student
    {
        $firstLine = $studentData[0];
        $student = Student::withNameCpfEmail(
            $firstLine['name'],
            $firstLine['cpf'],
            $firstLine['email']
        );

        $telephones = array_filter($studentData, function ($line) {
            return $line['ddd'] !== null && $line['telephone_number'] !== null;
        });
        foreach ($telephones as $line) {
            $student->addTelephone($line['ddd'], $line['telephone_number']);
        }

        return $student;
    }

    public function getAll(): array
    {
        $sql = '
            SELECT cpf, name, email, ddd, number AS telephone_number
                FROM students
            LEFT JOIN telephones ON telephoness.student_cpf = student.cpf;
        ';

        $stmt =  $this->connection->query($sql);

        $students = [];

        $listStudentsData = $stmt->fetchAll(\PDO::FETCH_ASSOC);


        foreach ($listStudentsData as $studentData) {
            if (!array_key_exists($studentData['cpf'], $students)) {
                $students[$studentData['cpf']] = Student::withNameCpfEmail(
                    $studentData['name'],
                    $studentData['cpf'],
                    $studentData['email'],
                );
            }

            if ($studentData['ddd'] !== null && $studentData['telephone_number'] !== null) {
                $students[$studentData['cpf']]->addTelephone(
                    $studentData['ddd'],
                    $studentData['telephone_number']
                );
            }
        }

        return array_values($students);
    }
}
