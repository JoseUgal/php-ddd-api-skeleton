<?php

declare(strict_types=1);

namespace JoseUgal\Tests\Shared\Infrastructure;

use JoseUgal\Shared\Domain\RandomNumberGenerator;

final class ConstantRandomNumberGenerator implements RandomNumberGenerator
{

    public function generate(): int
    {
        return 1;
    }
}