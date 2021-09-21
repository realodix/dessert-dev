<?php

namespace Realodix\NextProject\Test\Custom;

use PHPUnit\Framework\TestCase;

final class ShortNameTest extends TestCase
{
    public function testDirExists(): void
    {
        ass(__DIR__)
            ->dirExists();

        ass(__DIR__.DIRECTORY_SEPARATOR.'NotExisting')
            ->dirNotExist();
    }

    public function testDirIsReadable(): void
    {
        ass(__DIR__)
            ->dirIsReadable();
    }

    public function testDirIsWritable(): void
    {
        ass(__DIR__)
            ->dirIsWritable();
    }

    public function testGreater(): void
    {
        ass(7)
            ->greater(5, true)  // greaterThan
            ->isAbove(5, true)  // greaterThan
            ->greaterOrEqual(7) // greaterThanOrEqual
            ->isAtLeast(5);     // greaterThanOrEqual
    }

    public function testLess(): void
    {
        ass(7)
            ->less(10)       // lessThan
            ->isBelow(10)    // lessThan
            ->lessOrEqual(7) // lessThanOrEqual
            ->isAtMost(8);   // lessThanOrEqual
    }

    public function testMatchesRegularExpression(): void
    {
        ass('foobar')
            ->match('/foobar/')
            ->notMatch('/foobarbaz/');
    }

    public function testGreaterThan(): void
    {
        ass(2)->greater(1)
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
