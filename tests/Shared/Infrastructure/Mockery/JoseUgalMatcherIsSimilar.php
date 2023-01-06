<?php

declare(strict_types=1);

namespace JoseUgal\Tests\Shared\Infrastructure\Mockery;

use JoseUgal\Tests\Shared\Infrastructure\PhpUnit\Constraint\JoseUgalConstraintIsSimilar;
use Mockery\Matcher\MatcherAbstract;

final class JoseUgalMatcherIsSimilar extends MatcherAbstract
{
    private JoseUgalConstraintIsSimilar $constraint;

    public function __construct($value, $delta = 0.0)
    {
        parent::__construct($value);

        $this->constraint = new JoseUgalConstraintIsSimilar($value, $delta);
    }

    public function match(&$actual): bool
    {
        return $this->constraint->evaluate($actual, '', true);
    }

    public function __toString(): string
    {
        return 'Is similar';
    }
}
