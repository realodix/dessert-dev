<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;

final class ComparisonTest extends TestCase
{
    public function testEquals(): void
    {
        ass(5)->equals(5);
        ass('hello')->equals('hello');
        ass(5)->equals(5, 'user have 5 posts');

        ass(3)->notEquals(5);
    }

    public function testEqualsCanonicalizing(): void
    {
        ass([3, 2, 1])->equalsCanonicalizing([1, 2, 3]);

        ass([3, 2, 1])->notEqualsCanonicalizing([2, 3, 0, 1]);
    }

    public function testEqualsWithDelta(): void
    {
        ass(1.01)->equalsWithDelta(1.0, 0.1);
        ass(3.251)->equalsWithDelta(3.25, 0.01);
        ass(3.251)->equalsWithDelta(3.25, 0.01, 'respects delta');

        ass(1.2)->notEqualsWithDelta(1.0, 0.1);
        ass(3.252)->notEqualsWithDelta(3.25, 0.001);
        ass(3.252)->notEqualsWithDelta(3.25, 0.001, 'respects delta');
    }

    public function testGreaterLowerThan(): void
    {
        ass(7)->greaterThan(5);
        ass(7)->lessThan(10);
        ass(7)->lessThanOrEqual(7);
        ass(7)->lessThanOrEqual(8);
        ass(7)->greaterThanOrEqual(7);
        ass(7)->greaterThanOrEqual(5);
    }

    public function testSame(): void
    {
        ass(1)->same(0 + 1);
        ass(1)->notSame(true);
    }
}
