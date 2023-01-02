<?php

declare(strict_types=1);

namespace JoseUgal\Shared\Domain;

interface RandomNumberGenerator
{
    public function generate(): int;
}
