<?php

declare(strict_types=1);

namespace JoseUgal\Tests\Mooc\Courses\Application;

use JoseUgal\Mooc\Courses\Application\CreateCourseRequest;
use JoseUgal\Mooc\Courses\Domain\Course;
use JoseUgal\Mooc\Courses\Application\CourseCreator;
use JoseUgal\Mooc\Courses\Domain\CourseDuration;
use JoseUgal\Mooc\Courses\Domain\CourseId;
use JoseUgal\Mooc\Courses\Domain\CourseName;
use JoseUgal\Mooc\Courses\Domain\CourseRepository;
use PHPUnit\Framework\TestCase;
final class CourseCreatorTest extends TestCase
{
    /** @test */
    public function it_should_create_a_valid_course(): void
    {
        $repository = $this->createMock(CourseRepository::class);
        $creator = new CourseCreator($repository);

        $request = new CreateCourseRequest('5f18ee49-294d-448e-be34-be8f4089ce86', 'some-name', 'some-duration');

        $course = new Course(
            new CourseId($request->id()),
            new CourseName($request->name()),
            new CourseDuration($request->duration()));

        $repository->method('save')->with($course);

        $creator->__invoke($request);
    }
}