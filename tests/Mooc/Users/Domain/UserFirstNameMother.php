<?php

declare(strict_types=1);

namespace JoseUgal\Tests\Mooc\Users\Domain;

use JoseUgal\Mooc\Users\Domain\UserFirstName;
use JoseUgal\Tests\Shared\Domain\WordMother;

final class UserFirstNameMother
{
    public static function create(string $value): UserFirstName
    {
        return new UserFirstName($value);
    }

    public static function random(): UserFirstName
    {
        return self::create(WordMother::random());
    }
}