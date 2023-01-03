<?php

declare(strict_types=1);

namespace JoseUgal\Tests\Shared\Domain;

final class RandomElementPickerMother
{
    public static function from(...$elements): mixed
    {
        return MotherCreator::random()->randomElement($elements);
    }
}