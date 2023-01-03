<?php

declare(strict_types=1);

namespace JoseUgal\Tests\Mooc\Courses\Application;

use JoseUgal\Mooc\Courses\Application\CourseCreator;
use JoseUgal\Tests\Mooc\Courses\CourseModuleUnitTestCase;
use JoseUgal\Tests\Mooc\Courses\Domain\CourseMother;
use JoseUgal\Tests\Mooc\Courses\Domain\CreateCourseRequestMother;

final class CourseCreatorTest extends CourseModuleUnitTestCase
{
    private $creator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->creator = new CourseCreator($this->repository());
    }

    /** @test */
    public function it_should_create_a_valid_course(): void
    {
        $request = CreateCourseRequestMother::random();
        $course = CourseMother::fromRequest($request);

        $this->shouldSave($course);

        $this->creator->__invoke($request);
    }

}