<?php

declare(strict_types=1);

namespace JoseUgal\Tests\Mooc\Courses\Infrastructure;

use JoseUgal\Mooc\Courses\Domain\Course;
use JoseUgal\Mooc\Courses\Domain\CourseDuration;
use JoseUgal\Mooc\Courses\Domain\CourseId;
use JoseUgal\Mooc\Courses\Domain\CourseName;
use JoseUgal\Mooc\Courses\Infrastructure\FileCourseRepository;
use PHPUnit\Framework\TestCase;

final class FileCourseRepositoryTest extends TestCase
{

    /** @test */
    public function it_should_save_a_course(): void
    {
        $repository = new FileCourseRepository();
        $course = new Course(
            new CourseId('60c5ba1d-fbff-456c-ab31-0fa46f0918de'),
            new CourseName('name'),
            new CourseDuration('duration')
        );

        $repository->save($course);
    }

    /** @test */
    public function it_should_return_an_existing_course(): void
    {
        $repository = new FileCourseRepository();
        $course = new Course(
            new CourseId('60c5ba1d-fbff-456c-ab31-0fa46f0918de'),
            new CourseName('name'),
            new CourseDuration('duration')
        );

        $repository->save($course);

        $this->assertEquals($course, $repository->search($course->id()));
    }

    /** @test */
    public function it_should_not_return_an_non_existing_course(): void
    {
        $repository = new FileCourseRepository();

        $this->assertNull($repository->search(new CourseId('4e25a70c-bf7f-4888-a035-c4a0e386eedf')));
    }

}