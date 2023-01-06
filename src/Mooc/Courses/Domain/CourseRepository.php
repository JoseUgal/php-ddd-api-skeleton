<?php

declare(strict_types=1);

namespace JoseUgal\Mooc\Courses\Domain;

use JoseUgal\Mooc\Shared\Domain\Courses\CourseId;

interface CourseRepository
{
    public function save(Course $course): void;
    public function search(CourseId $id): ?Course;
}