<?php

declare(strict_types=1);

namespace JoseUgal\Mooc\Courses\Infrastructure\Persistence;

use JoseUgal\Mooc\Courses\Domain\Course;
use JoseUgal\Mooc\Courses\Domain\CourseRepository;
use JoseUgal\Mooc\Shared\Domain\Courses\CourseId;
use JoseUgal\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class DoctrineCourseRepository extends DoctrineRepository implements CourseRepository
{
    public function save(Course $course): void
    {
        $this->persist($course);
    }

    public function search(CourseId $id): ?Course
    {
        return $this->repository(Course::class)->find($id);
    }
}
