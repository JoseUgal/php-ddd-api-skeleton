<?php

declare(strict_types=1);

namespace JoseUgal\Tests\Mooc\Courses\Domain;

use JoseUgal\Mooc\Courses\Application\CreateCourseRequest;

final class CreateCourseRequestMother
{

    public static function create(string $id, string $name, string $duration): CreateCourseRequest
    {
        return new CreateCourseRequest($id, $name, $duration);
    }

    public static function random(): CreateCourseRequest
    {
        return self::create(
            CourseIdMother::random()->value(),
            CourseNameMother::random()->value(),
            CourseDurationMother::random()->value()
        );
    }

}