<?php

declare(strict_types=1);

namespace JoseUgal\Tests\Mooc\Users\Domain;

use JoseUgal\Mooc\Users\Domain\UserLastName;
use JoseUgal\Tests\Shared\Domain\WordMother;

final class UserLastNameMother
{
    public static function create(string $value): UserLastName
    {
        return new UserLastName($value);
    }

    public static function random(): UserLastName
    {
        return self::create(WordMother::random());
    }
}