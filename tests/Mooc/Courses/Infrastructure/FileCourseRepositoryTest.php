<?php

declare(strict_types=1);

namespace JoseUgal\Tests\Mooc\Courses\Infrastructure;

use JoseUgal\Mooc\Courses\Infrastructure\FileCourseRepository;
use JoseUgal\Tests\Mooc\Courses\Domain\CourseIdMother;
use JoseUgal\Tests\Mooc\Courses\Domain\CourseMother;
use PHPUnit\Framework\TestCase;

final class FileCourseRepositoryTest extends TestCase
{

    /** @test */
    public function it_should_save_a_course(): void
    {
        $repository = new FileCourseRepository();

        $course = CourseMother::random();

        $repository->save($course);
    }

    /** @test */
    public function it_should_return_an_existing_course(): void
    {
        $repository = new FileCourseRepository();

        $course = CourseMother::random();

        $repository->save($course);

        $this->assertEquals($course, $repository->search($course->id()));
    }

    /** @test */
    public function it_should_not_return_an_non_existing_course(): void
    {
        $repository = new FileCourseRepository();

        $courseId = CourseIdMother::random();

        $this->assertNull($repository->search($courseId));
    }

}