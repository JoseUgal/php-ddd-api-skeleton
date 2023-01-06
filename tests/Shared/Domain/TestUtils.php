<?php

declare(strict_types=1);

namespace JoseUgal\Tests\Shared\Domain;

use JoseUgal\Tests\Shared\Infrastructure\Mockery\JoseUgalMatcherIsSimilar;
use JoseUgal\Tests\Shared\Infrastructure\PhpUnit\Constraint\JoseUgalConstraintIsSimilar;

final class TestUtils
{
    public static function isSimilar($expected, $actual): bool
    {
        $constraint = new JoseUgalConstraintIsSimilar($expected);

        return $constraint->evaluate($actual, '', true);
    }

    public static function assertSimilar($expected, $actual): void
    {
        $constraint = new JoseUgalConstraintIsSimilar($expected);

        $constraint->evaluate($actual);
    }

    public static function similarTo($value, $delta = 0.0): JoseUgalMatcherIsSimilar
    {
        return new JoseUgalMatcherIsSimilar($value, $delta);
    }
}
