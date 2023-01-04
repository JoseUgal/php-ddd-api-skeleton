<?php

declare(strict_types=1);

namespace JoseUgal\Tests\Mooc\Users\Domain;

use JoseUgal\Mooc\Users\Application\CreateUserRequest;
use JoseUgal\Mooc\Users\Domain\User;
use JoseUgal\Mooc\Users\Domain\UserFirstName;
use JoseUgal\Mooc\Users\Domain\UserId;
use JoseUgal\Mooc\Users\Domain\UserLastName;

final class UserMother
{

    public static function create(UserId $id, UserFirstName $firstName, UserLastName $lastName): User
    {
        return new User($id, $firstName, $lastName);
    }

    public static function fromRequest(CreateUserRequest $request): User
    {
        return self::create(
            UserIdMother::create($request->id()),
            UserFirstNameMother::create($request->firstName()),
            UserLastNameMother::create($request->lastName()),
        );
    }

    public static function random(): User
    {
        return self::create(
          UserIdMother::random(),
          UserFirstNameMother::random(),
          UserLastNameMother::random()
        );
    }

}