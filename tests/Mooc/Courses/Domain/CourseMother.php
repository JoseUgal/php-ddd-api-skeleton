<?php

declare(strict_types=1);

namespace JoseUgal\Tests\Mooc\Courses\Domain;

use JoseUgal\Mooc\Courses\Application\CreateCourseRequest;
use JoseUgal\Mooc\Courses\Domain\Course;
use JoseUgal\Mooc\Courses\Domain\CourseDuration;
use JoseUgal\Mooc\Courses\Domain\CourseName;
use JoseUgal\Mooc\Shared\Domain\Courses\CourseId;

final class CourseMother
{

    public static function create(CourseId $id, CourseName $name, CourseDuration $duration): Course
    {
        return new Course($id, $name, $duration);
    }

    public static function fromRequest(CreateCourseRequest $request): Course
    {
        return self::create(
            CourseIdMother::create($request->id()),
            CourseNameMother::create($request->name()),
            CourseDurationMother::create($request->duration())
        );
    }

    public static function random(): Course
    {
        return self::create(
            CourseIdMother::random(),
            CourseNameMother::random(),
            CourseDurationMother::random()
        );
    }
}