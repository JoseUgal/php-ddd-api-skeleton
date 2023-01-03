<?php

declare(strict_types=1);

namespace JoseUgal\Shared\Domain\ValueObject;

use InvalidArgumentException;
use Ramsey\Uuid\Uuid as RamseyUuid;

class Uuid
{
    private string $value;

    public function __construct(string $value)
    {
        $this->ensureIsValidUuid($value);

        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(Uuid $other): bool
    {
        return $this->value() === $other->value();
    }

    public static function random(): self
    {
        return new self(RamseyUuid::uuid4()->toString());
    }

    private function ensureIsValidUuid(string $id): void
    {
        if(!RamseyUuid::isValid($id)) {
            throw new InvalidArgumentException(sprintf('<%s> does not allow the value <%s>', static::class, $id));
        }
    }
}