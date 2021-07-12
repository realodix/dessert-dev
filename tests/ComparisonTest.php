<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;

final class ComparisonTest extends TestCase
{
    protected function setUp(): void
    {
        $this->assetsDir = __DIR__.DIRECTORY_SEPARATOR.'_files'.DIRECTORY_SEPARATOR;
    }

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

    public function testEqualsIgnoringCase(): void
    {
        ass('foo')->equalsIgnoringCase('FOO');
        ass('foo')->notEqualsIgnoringCase('BAR');
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

    public function testGreaterThan(): void
    {
        ass(7)->greaterThan(5);

        ass(7)->greaterThanOrEqual(7);
        ass(7)->greaterThanOrEqual(5);
    }

    public function testLessThan(): void
    {
        ass(7)->lessThan(10);
        ass(7)->lessThanOrEqual(7);
        ass(7)->lessThanOrEqual(8);
    }

    public function testSame(): void
    {
        ass(1)->same(0 + 1);
        ass(1)->notSame(true);
    }

    public function testStringEqualsFile(): void
    {
        ass('testing 123')->stringEqualsFile($this->assetsDir.'StringEqualsFile.txt');
        ass('Another string')->stringNotEqualsFile($this->assetsDir.'StringEqualsFile.txt');
    }

    public function testStringEqualsFileCanonicalizing(): void
    {
        ass('testing 123')
            ->stringEqualsFileCanonicalizing($this->assetsDir.'StringEqualsFile.txt');
        ass('notSame')
            ->stringNotEqualsFileCanonicalizing($this->assetsDir.'StringEqualsFile.txt');
    }

    public function testStringEqualsFileIgnoringCase(): void
    {
        ass('TESTING 123')
            ->stringEqualsFileIgnoringCase($this->assetsDir.'StringEqualsFile.txt');
        ass('Test 123')
            ->stringNotEqualsFileIgnoringCase($this->assetsDir.'StringEqualsFile.txt');
    }
}