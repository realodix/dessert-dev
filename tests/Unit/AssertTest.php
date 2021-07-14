<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;
use Realodix\NextProject\Assert;

final class AssertTest extends TestCase
{
    public function testArrayHasKey(): void
    {
        $errors = ['title' => 'You should add title'];
        ass($errors)->hasKey('title');
        ass($errors)->notHasKey('body');
    }

    public function testCount(): void
    {
        ass([1, 2, 3])->count(3);
        ass([1, 2, 3])->notCount(2);
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

    public function testJson(): void
    {
        $json = json_encode(['foo' => 'bar']);

        ass($json)->json();
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
    }
}
