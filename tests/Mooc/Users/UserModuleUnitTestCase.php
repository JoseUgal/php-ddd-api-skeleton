<?php

namespace JoseUgal\Tests\Mooc\Users;

use JoseUgal\Mooc\Users\Domain\User;
use JoseUgal\Mooc\Users\Domain\UserRepository;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

abstract class UserModuleUnitTestCase extends TestCase
{

    private $repository;

    protected function shouldSave(User $user): void
    {
        $this->repository()->method('save')->with($user);
    }

    /**
     * @return UserRepository|MockObject
     */
    protected function repository(): MockObject
    {
        return $this->repository = $this->repository ?: $this->createMock(UserRepository::class);
    }
}