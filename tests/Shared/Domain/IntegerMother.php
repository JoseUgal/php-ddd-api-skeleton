<?php

declare(strict_types=1);

namespace JoseUgal\Tests\Shared\Domain;

final class IntegerMother
{
    public static function random(): int
    {
        return self::between(1);
    }

    public static function between(int $min, $max = PHP_INT_MAX): int
    {
        return MotherCreator::random()->numberBetween($min, $max);
    }

    public static function lessTan(int $max): int
    {
        return self::between(1, $max);
    }
}