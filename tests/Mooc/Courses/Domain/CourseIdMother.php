<?php

declare(strict_types=1);

namespace JoseUgal\Tests\Mooc\Courses\Domain;

use JoseUgal\Mooc\Courses\Domain\CourseId;
use JoseUgal\Tests\Shared\Domain\UuidMother;

final class CourseIdMother
{

    public static function create(string $value): CourseId
    {
        return new CourseId($value);
    }

    public static function random(): CourseId
    {
        return self::create(UuidMother::random());
    }

}