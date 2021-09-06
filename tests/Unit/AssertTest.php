<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;
use Realodix\NextProject\Assert;
use Realodix\NextProject\Check;

final class AssertTest extends TestCase
{
    public function testVariantsStaticClass(): void
    {
        Assert::that(true)
            ->true()
            ->notFalse();

        Check::that(true)
            ->true()
            ->notFalse();
    }
}
