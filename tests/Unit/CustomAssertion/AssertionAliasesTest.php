<?php

namespace Realodix\NextProject\Test\CustomAssertion;

use PHPUnit\Framework\TestCase;

final class AssertionAliasesTest extends TestCase
{
    /** @test */
    public function regExp(): void
    {
        ass('foobar')
            ->match('/foobar/')
            ->notMatch('/foobarbaz/');
    }

    public function testGreaterThan(): void
    {
        ass(2)
            ->greater(1)
            ->greaterOrEqual(2);

        ass(2)->isAbove(1)
              ->isAtLeast(2);
    }

    public function testLessThan(): void
    {
        ass(1)->less(2)
              ->lessOrEqual(1);

        ass(1)->isBelow(2)
              ->isAtMost(1);
    }
}
