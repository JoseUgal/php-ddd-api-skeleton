<?php

declare(strict_types=1);

namespace JoseUgal\Mooc\Users\Application;

use JoseUgal\Mooc\Users\Domain\User;
use JoseUgal\Mooc\Users\Domain\UserFirstName;
use JoseUgal\Mooc\Users\Domain\UserId;
use JoseUgal\Mooc\Users\Domain\UserLastName;
use JoseUgal\Mooc\Users\Domain\UserRepository;

class UserCreator
{

    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CreateUserRequest $request): void
    {
        $id = new UserId($request->id());
        $firstName = new UserFirstName($request->firstName());
        $lastName = new UserLastName($request->lastName());

        $user = new User($id, $firstName, $lastName);

        $this->repository->save($user);
    }
}