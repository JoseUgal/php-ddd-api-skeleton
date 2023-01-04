<?php

declare(strict_types=1);

namespace JoseUgal\Mooc\Users\Domain;

use InvalidArgumentException;
use JoseUgal\Shared\Domain\ValueObject\StringValueObject;

final class UserLastName extends StringValueObject
{

    public function __construct(string $value)
    {
        $this->ensureLengthIsInferiorThan50Characters($value);
        parent::__construct($value);
    }

    private function ensureLengthIsInferiorThan50Characters(string $value): void
    {
        if(strlen($value) > 50){
            throw new InvalidArgumentException("The CourseName has more than 30 characters");
        }
    }

}