<?php

declare(strict_types=1);

namespace JoseUgal\Tests\Mooc\Courses\Application;

use JoseUgal\Mooc\Courses\Domain\Course;
use JoseUgal\Mooc\Courses\Application\CourseCreator;
use JoseUgal\Mooc\Courses\Domain\CourseRepository;
use PHPUnit\Framework\TestCase;
final class CourseCreatorTest extends TestCase
{
    /** @test */
    public function it_should_create_a_valid_course(): void
    {
        $repository = $this->createMock(CourseRepository::class);
        $creator = new CourseCreator($repository);

        $id = 'some-id';
        $name = 'some-name';
        $duration = 'some-duration';

        $course = new Course($id, $name, $duration);
        $repository->method('save')->with($course);

        $creator->__invoke($id, $name, $duration);
    }
}