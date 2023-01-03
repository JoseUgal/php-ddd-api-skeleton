<?php

declare(strict_types=1);

namespace JoseUgal\Tests\Mooc\Courses\Domain;

use JoseUgal\Mooc\Courses\Domain\CourseDuration;
use JoseUgal\Tests\Shared\Domain\IntegerMother;
use JoseUgal\Tests\Shared\Domain\RandomElementPickerMother;
use JoseUgal\Tests\Shared\Domain\WordMother;

final class CourseDurationMother
{

    public static function create(string $value): CourseDuration
    {
        return new CourseDuration($value);
    }

    public static function random(): CourseDuration
    {
        return self::create(
            sprintf(
                '%s %s',
                IntegerMother::lessTan(100),
                RandomElementPickerMother::from('months', 'years', 'days', 'hours', 'minutes', 'seconds')
            )
        );
    }

}