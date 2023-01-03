<?php

declare(strict_types=1);

namespace JoseUgal\Apps\Mooc\Backend\Controller\Courses;

use JoseUgal\Mooc\Courses\Application\CourseCreator;
use JoseUgal\Mooc\Courses\Application\CreateCourseRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CoursesPutController
{
    private  $creator;

    public function __construct(CourseCreator $creator)
    {
        $this->creator = $creator;
    }

    public function __invoke(string $id, Request $request): Response
    {
        $name = $request->get('name');
        $duration = $request->get('duration');

        $courseCreatorRequest = new CreateCourseRequest($id, $name, $duration);

        $this->creator->__invoke($courseCreatorRequest);

        return new Response('', Response::HTTP_CREATED);
    }
}