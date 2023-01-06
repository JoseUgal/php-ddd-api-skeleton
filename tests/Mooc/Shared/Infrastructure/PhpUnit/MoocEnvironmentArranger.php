<?php

declare(strict_types=1);

namespace JoseUgal\Tests\Mooc\Shared\Infrastructure\PhpUnit;

use JoseUgal\Tests\Shared\Infrastructure\Arranger\EnvironmentArranger;
use JoseUgal\Tests\Shared\Infrastructure\Doctrine\MySqlDatabaseCleaner;
use Doctrine\ORM\EntityManager;
use function Lambdish\Phunctional\apply;

final class MoocEnvironmentArranger implements EnvironmentArranger
{
    public function __construct(private EntityManager $entityManager)
    {
    }

    public function arrange(): void
    {
        apply(new MySqlDatabaseCleaner(), [$this->entityManager]);
    }

    public function close(): void
    {
    }
}
