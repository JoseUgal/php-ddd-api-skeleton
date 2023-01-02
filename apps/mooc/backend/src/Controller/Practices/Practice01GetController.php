<?php

declare(strict_types=1);

namespace JoseUgal\Apps\Mooc\Backend\Controller\Practices;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class Practice01GetController
{
    public function __invoke(Request $request): Response
    {
        $name = "Anonimo";

        if($request->get('name') !== null)
            $name = $request->get('name');

        return new JsonResponse(
          [
              'mooc-backend' => 'ok',
              'message' => "Esto va fino $name"
          ]
        );
    }
}