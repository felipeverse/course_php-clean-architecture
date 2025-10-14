<?php

namespace Course\Architecture;

use Stringable;

class Telephone implements Stringable
{
    private string $ddd;
    private string $number;

    public function __construct(string $ddd, string $number)
    {
        $this->setDdd($ddd);
        $this->setNumber($number);
    }

    public function setDdd(string $ddd)
    {
        $options = [
            'options' => [
                'regexp' => '/\d{2}/',
            ],
        ];

        if (filter_var($ddd, FILTER_VALIDATE_REGEXP, $options) === false) {
            throw new \InvalidArgumentException('Invalid phone ddd');
        }

        $this->ddd = $ddd;
    }

    public function setNumber(string $number)
    {
        $options = [
            'options' => [
                'regexp' => '/\d{8,9}/'
            ]
        ];

        if (filter_var($number, FILTER_VALIDATE_REGEXP, $options) === false) {
            throw new \InvalidArgumentException('Invalid phone number');
        }

        $this->number = $number;
    }

    public function __toString(): string
    {
        return "({$this->ddd}) {$this->number}";
    }
}
