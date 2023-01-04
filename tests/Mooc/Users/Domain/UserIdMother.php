<?php

declare(strict_types=1);

namespace JoseUgal\Tests\Mooc\Users\Domain;

use JoseUgal\Mooc\Users\Domain\UserId;
use JoseUgal\Tests\Shared\Domain\UuidMother;

final class UserIdMother
{
    public static function create(string $value): UserId
    {
        return new UserId($value);
    }

    public static function random(): UserId
    {
        return self::create(UuidMother::random());
    }
}