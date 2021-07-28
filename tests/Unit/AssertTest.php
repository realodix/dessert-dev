<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;
use Realodix\NextProject\Assert;
use Realodix\NextProject\Check;

final class AssertTest extends TestCase
{
    public function testArrayHasKey(): void
    {
        $array = ['title' => 'You should add title'];

        ass($array)
            ->hasKey('title')
            ->notHasKey('body');
    }

    public function testCount(): void
    {
        ass([1, 2, 3])
            ->count(3)
            ->notCount(2);
    }

    public function testEmpty(): void
    {
        ass([])->empty();
        ass(['3', '5'])->notEmpty();
    }

    public function testFinite(): void
    {
        ass(1)->finite();
    }

    public function testInfinite(): void
    {
        ass(INF)->infinite();
    }

    public function testNan(): void
    {
        ass(NAN)->nan();
    }

    public function testVariants(): void
    {
        expect([])->empty();
        should([])->empty();
        verify([])->empty();
    }

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
