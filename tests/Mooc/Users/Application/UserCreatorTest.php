<?php

declare(strict_types=1);

namespace JoseUgal\Tests\Mooc\Users\Application;

use JoseUgal\Mooc\Users\Application\UserCreator;
use JoseUgal\Tests\Mooc\Users\Domain\CreateUserRequestMother;
use JoseUgal\Tests\Mooc\Users\Domain\UserMother;
use JoseUgal\Tests\Mooc\Users\UserModuleUnitTestCase;

final class UserCreatorTest extends UserModuleUnitTestCase
{

    private $creator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->creator = new UserCreator($this->repository());
    }

    /** @test */
    public function it_should_be_create_a_valid_user()
    {
        $request = CreateUserRequestMother::random();

        $user = UserMother::fromRequest($request);

        $this->shouldSave($user);

        $this->creator->__invoke($request);
    }

}