<?php

declare(strict_types=1);

namespace JoseUgal\Mooc\Courses\Infrastructure\Persistence\Doctrine;

use JoseUgal\Mooc\Shared\Domain\Courses\CourseId;
use JoseUgal\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class CourseIdType extends UuidType
{
    protected function typeClassName(): string
    {
        return CourseId::class;
    }
}
