<?php

declare(strict_types=1);

namespace JoseUgal\Mooc\Courses\Application;

final class CreateCourseRequest
{
    private string $id;
    private string $name;
    private string $duration;

    public function __construct(string $id, string $name, string $duration)
    {
        $this->id = $id;
        $this->name = $name;
        $this->duration = $duration;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function duration(): string
    {
        return $this->duration;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setDuration(string $duration): void
    {
        $this->duration = $duration;
    }

}