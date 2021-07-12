<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;

final class AssertTest extends TestCase
{
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
}
