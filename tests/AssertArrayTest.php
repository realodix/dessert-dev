<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;

final class AssertArrayTest extends TestCase
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
}

class FakeClassForTestingArray
{
    public static $staticProperty;
}
