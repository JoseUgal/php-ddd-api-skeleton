<?php

declare(strict_types=1);

namespace JoseUgal\Apps\Mooc\Backend\Controller\Users;

use JoseUgal\Mooc\Users\Application\CreateUserRequest;
use JoseUgal\Mooc\Users\Application\UserCreator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class UsersPutController
{

    private UserCreator $creator;

    public function __construct(UserCreator $creator)
    {
        $this->creator = $creator;
    }

    public function __invoke(string $id, Request $request): Response
    {

        $request = new CreateUserRequest(
            $id,
            $request->get('firstName'),
            $request->get('lastName')
        );

        $this->creator->__invoke($request);

        return new Response('', Response::HTTP_CREATED);
    }

}