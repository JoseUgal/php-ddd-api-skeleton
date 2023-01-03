<?php

declare(strict_types=1);

namespace JoseUgal\Tests\Mooc\Courses\Infrastructure;

use JoseUgal\Mooc\Courses\Domain\Course;
use JoseUgal\Mooc\Courses\Infrastructure\FileCourseRepository;
use PHPUnit\Framework\TestCase;

final class FileCourseRepositoryTest extends TestCase
{

    /** @test */
    public function it_should_save_a_course(): void
    {
        $repository = new FileCourseRepository();
        $course = new Course('id', 'name', 'duration');

        $repository->save($course);
    }

    /** @test */
    public function it_should_return_an_existing_course(): void
    {
        $repository = new FileCourseRepository();
        $course = new Course('id', 'name', 'duration');

        $repository->save($course);

        $this->assertEquals($course, $repository->search($course->id()));
    }

    /** @test */
    public function it_should_not_return_an_non_existing_course(): void
    {
        $repository = new FileCourseRepository();

        $this->assertNull($repository->search('randomId'));
    }

}