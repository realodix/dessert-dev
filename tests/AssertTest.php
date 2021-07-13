<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;
use Realodix\NextProject\Assert;

final class AssertTest extends TestCase
{
    public function testArrayHasKey(): void
    {
        $errors = ['title' => 'You should add title'];
        ass($errors)->arrayHasKey('title');
        ass($errors)->arrayNotHasKey('body');
    }

    public function testContains(): void
    {
        ass([3, 2])->contains(3);
        ass([3, 2])->notContains(5, 'user have 5 posts');
    }

    public function testContainsOnly(): void
    {
        ass(['1', '2', '3'])->containsOnly('string');
        ass(['1', '2', 3])->notContainsOnly('string');
    }

    public function testContainsOnlyInstancesOf(): void
    {
        $array = [
            new FakeClassForTestingArray(),
            new FakeClassForTestingArray(),
            new FakeClassForTestingArray(),
        ];

        ass($array)->containsOnlyInstancesOf(FakeClassForTestingArray::class);
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

    public function testFalse(): void
    {
        ass(false)->false();
        ass(true)->notFalse();
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

    public function testNull(): void
    {
        ass(null)->null();
        ass(true)->notNull();
    }

    public function testTrue(): void
    {
        ass(true)->true();
        ass(false)->notTrue();
    }

    public function testVariants(): void
    {
        expect([])->empty();
        should([])->empty();
        verify([])->empty();
    }

    public function testStaticClass(): void
    {
        Assert::that(true)
            ->true()
            ->notFalse();
    }
}

class FakeClassForTestingArray
{
    public static $staticProperty;
}
