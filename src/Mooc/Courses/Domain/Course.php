<?php

declare(strict_types=1);

namespace JoseUgal\Mooc\Courses\Domain;

use JoseUgal\Mooc\Shared\Domain\Courses\CourseId;
use JoseUgal\Shared\Domain\Aggregate\AggregateRoot;

final class Course extends AggregateRoot
{

    private CourseId $id;
    private CourseName $name;
    private CourseDuration $duration;

    public function __construct(CourseId $id, CourseName $name, CourseDuration $duration)
    {
        $this->id           = $id;
        $this->name         = $name;
        $this->duration     = $duration;
    }

    public function id(): CourseId
    {
        return $this->id;
    }

    public function name(): CourseName
    {
        return $this->name;
    }

    public function duration(): CourseDuration
    {
        return $this->duration;
    }

    public function setId(CourseId $id): void
    {
        $this->id = $id;
    }

    public function setName(CourseName $name): void
    {
        $this->name = $name;
    }

    public function setDuration(CourseDuration $duration): void
    {
        $this->duration = $duration;
    }
}