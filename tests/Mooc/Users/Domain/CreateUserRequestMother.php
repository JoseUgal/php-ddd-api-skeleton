<?php

declare(strict_types=1);

namespace JoseUgal\Tests\Mooc\Users\Domain;

use JoseUgal\Mooc\Users\Application\CreateUserRequest;

final class CreateUserRequestMother
{
    public static function create(string $id, string $firstName, string $lastName): CreateUserRequest
    {
        return new CreateUserRequest($id, $firstName, $lastName);
    }

    public static function random(): CreateUserRequest
    {
        return self::create(
            UserIdMother::random()->value(),
            UserFirstNameMother::random()->value(),
            UserLastNameMother::random()->value()
        );
    }

}