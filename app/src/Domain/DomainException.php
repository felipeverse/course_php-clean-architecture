<?php

namespace Course\Architecture\Domain;

use Throwable;

class DomainException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, Throwable|null $previous = null)
    {
        return parent::__construct($message, $code, $previous);
    }
}
