<?php

declare(strict_types=1);

namespace JoseUgal\Mooc\Courses\Application;

use JoseUgal\Mooc\Courses\Domain\Course;
use JoseUgal\Mooc\Courses\Domain\CourseRepository;

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
            $request->id(),
            $request->name(),
            $request->duration()
        );

        $this->repository->save($course);
    }
}