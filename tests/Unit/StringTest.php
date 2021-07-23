<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;

final class StringTest extends TestCase
{
    public function testContainsOnly(): void
    {
        ass(['1', '2', '3'])->containsOnly('string');
        ass(['1', '2', 3])->notContainsOnly('string');
    }

    public function testJson(): void
    {
        $json = json_encode(['foo' => 'bar']);

        ass($json)->json();
    }

    public function testMatchesRegularExpression(): void
    {
        ass('foobar')
            ->matchesRegularExpression('/foobar/')
            ->doesNotMatchRegularExpression('/foobarbaz/');
    }

    public function testStringContainsString(): void
    {
        ass('foo bar')
            ->stringContainsString('o b')
            ->stringNotContainsString('BAR');
    }

    public function testStringContainsStringIgnoringCase(): void
    {
        ass('foo bar')
            ->stringContainsStringIgnoringCase('O b')
            ->stringNotContainsStringIgnoringCase('baz');
    }

    public function testStringEndsWith(): void
    {
        ass('foobar')
            ->endWith('ar')
            ->endNotWith('foo');
    }

    public function testStringMatchesFormat(): void
    {
        ass('somestring')
            ->stringMatchesFormat('%s')
            ->stringNotMatchesFormat('%i');
    }

    public function testStringMatchesFormatFile(): void
    {
        $formatFile = TEST_FILES_PATH.'string_foobar.txt';

        ass('foo_bar')->stringMatchesFormatFile($formatFile);
        ass('string_not_matches')->stringNotMatchesFormatFile($formatFile);
    }

    public function testStringStartsWith(): void
    {
        ass('foobar')
            ->startWith('fo')
            ->startNotWith('ar');
    }
}
