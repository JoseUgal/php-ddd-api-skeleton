<?php

declare(strict_types=1);

namespace JoseUgal\Tests\Mooc\Courses;

use JoseUgal\Mooc\Courses\Domain\CourseRepository;
use JoseUgal\Tests\Mooc\Shared\Infrastructure\PhpUnit\MoocContextInfrastructureTestCase;

abstract class CoursesModuleInfrastructureTestCase extends MoocContextInfrastructureTestCase
{
    protected function repository(): CourseRepository
    {
        return $this->service(CourseRepository::class);
    }
}
