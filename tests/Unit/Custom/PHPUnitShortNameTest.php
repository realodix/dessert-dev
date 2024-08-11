<?php

namespace Realodix\Dessert\Test\Custom;

use PHPUnit\Framework\TestCase;

final class PHPUnitShortNameTest extends TestCase
{
    public function testDirExists(): void
    {
        verify(__DIR__)
            ->dirExists();

        verify(__DIR__ . DIRECTORY_SEPARATOR . 'NotExisting')
            ->dirNotExist();
    }

    public function testDirIsReadable(): void
    {
        verify(__DIR__)
            ->dirIsReadable();
    }

    public function testDirIsWritable(): void
    {
        verify(__DIR__)
            ->dirIsWritable();
    }

    public function testGreater(): void
    {
        verify(7)
            ->greater(5, true)   // greaterThan
            ->isAbove(5, true);  // greaterThan
    }

    public function testGreaterOrEqual(): void
    {
        verify(7)
            ->greaterOrEqual(7) // greaterThanOrEqual
            ->isAtLeast(5);     // greaterThanOrEqual
    }

    public function testLess(): void
    {
        verify(7)
            ->less(10)        // lessThan
            ->isBelow(10);    // lessThan
    }

    public function testLessOrEqual(): void
    {
        verify(7)
            ->lessOrEqual(7) // lessThanOrEqual
            ->isAtMost(8);   // lessThanOrEqual
    }

    public function testMatch(): void
    {
        verify('foobar')
            ->match('/foobar/')
            ->notMatch('/foobarbaz/');
    }

    public function testStartWith(): void
    {
        verify('foobar')
            ->startWith('fo')
            ->startNotWith('ar');
    }

    public function testEndsWith(): void
    {
        verify('foobar')
            ->endWith('ar')
            ->endNotWith('foo');
    }
}
