<?php

namespace Course\Architecture\Domain\Student;

use Throwable;
use DomainException;

class StudentNotFoundExpcetion extends DomainException
{
    public function __construct(string $message = "", int $code = 0, Throwable|null $previous = null)
    {
        return parent::__construct($message, $code, $previous);
    }
}
