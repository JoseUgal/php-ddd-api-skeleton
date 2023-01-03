<?php

declare(strict_types=1);

namespace JoseUgal\Mooc\Courses\Domain;

use JoseUgal\Shared\Domain\ValueObject\StringValueObject;
use InvalidArgumentException;

final class CourseName extends StringValueObject
{

    public function __construct(string $value)
    {
        $this->ensureLengthIsInferiorThan30Characters($value);
        parent::__construct($value);
    }

    private function ensureLengthIsInferiorThan30Characters(string $value): void
    {
        if(strlen($value) > 30){
            throw new InvalidArgumentException("The CourseName has more than 30 characters");
        }
    }

}