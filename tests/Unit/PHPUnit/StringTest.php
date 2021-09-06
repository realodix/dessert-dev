<?php

namespace Realodix\NextProject\Test\PHPUnit;

use PHPUnit\Framework\TestCase;

final class StringTest extends TestCase
{
    public function testJson(): void
    {
        $json = json_encode(['foo' => 'bar']);

        ass($json)->json();
    }

    public function testStringStartsWith(): void
    {
        ass('foobar')
            ->startWith('fo')
            ->startNotWith('ar');
    }

    public function testStringEndsWith(): void
    {
        ass('foobar')
            ->endWith('ar')
            ->endNotWith('foo');
    }
}
