<?php

declare(strict_types=1);

namespace JoseUgal\Mooc\Courses\Application;

use JoseUgal\Mooc\Courses\Domain\Course;
use JoseUgal\Mooc\Courses\Domain\CourseDuration;
use JoseUgal\Mooc\Courses\Domain\CourseName;
use JoseUgal\Mooc\Courses\Domain\CourseRepository;
use JoseUgal\Mooc\Shared\Domain\Courses\CourseId;

final class CourseCreator
{
    private CourseRepository $repository;

    public function __construct(CourseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CreateCourseRequest $request): void
    {
        $course = new Course(
            new CourseId($request->id()),
            new CourseName($request->name()),
            new CourseDuration($request->duration())
        );

        $this->repository->save($course);
    }
}