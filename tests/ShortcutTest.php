<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;

final class ShortcutTest extends TestCase
{
    /** @test */
    public function regExp(): void
    {
        ass('foobar')->match('/foobar/');
        ass('foobar')->notMatch('/foobarbaz/');
    }

    public function testGreaterThan(): void
    {
        ass(2)->greater(1);
        ass(1)->greaterOrEqual(1);

        ass(2)->isAbove(1);
        ass(1)->isAtLeast(1);
    }

    public function testLessThan(): void
    {
        ass(1)->less(2);
        ass(1)->lessOrEqual(1);

        ass(1)->isBelow(2);
        ass(1)->isAtMost(1);
    }
}
