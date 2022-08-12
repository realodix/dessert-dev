<?php

namespace Realodix\Dessert\Test\Custom;

use PHPUnit\Framework\TestCase;

final class PHPUnitShortNameTest extends TestCase
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
            ->greater(5, true)   // greaterThan
            ->isAbove(5, true);  // greaterThan
    }

    public function testGreaterOrEqual(): void
    {
        ass(7)
            ->greaterOrEqual(7) // greaterThanOrEqual
            ->isAtLeast(5);     // greaterThanOrEqual
    }

    public function testLess(): void
    {
        ass(7)
            ->less(10)        // lessThan
            ->isBelow(10);    // lessThan
    }

    public function testLessOrEqual(): void
    {
        ass(7)
            ->lessOrEqual(7) // lessThanOrEqual
            ->isAtMost(8);   // lessThanOrEqual
    }

    public function testMatch(): void
    {
        ass('foobar')
            ->match('/foobar/')
            ->notMatch('/foobarbaz/');
    }

    public function testStartWith(): void
    {
        ass('foobar')
            ->startWith('fo')
            ->startNotWith('ar');
    }

    public function testEndsWith(): void
    {
        ass('foobar')
            ->endWith('ar')
            ->endNotWith('foo');
    }

    public function testXmlStringToString(): void
    {
        ass('<foo/>')
            ->xmlStringToString('<foo/>')
            ->xmlStringNotToString('<bar/>');
    }
}
