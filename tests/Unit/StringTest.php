<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;

final class StringTest extends TestCase
{
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

    public function testMatchesRegularExpression(): void
    {
        ass('foobar')->matchesRegularExpression('/foobar/');
        ass('foobar')->doesNotMatchRegularExpression('/foobarbaz/');
    }

    public function testStringContainsString(): void
    {
        ass('foo bar')->stringContainsString('o b');
        ass('foo bar')->stringNotContainsString('BAR');
    }

    public function testStringContainsStringIgnoringCase(): void
    {
        ass('foo bar')->stringContainsStringIgnoringCase('O b');
        ass('foo bar')->stringNotContainsStringIgnoringCase('baz');
    }

    public function testStringEndsWith(): void
    {
        ass('A completely not funny string')->stringEndsWith('ny string');
        ass('A completely not funny string')->stringEndsNotWith('A completely');
    }

    public function testStringMatchesFormat(): void
    {
        ass('somestring')->stringMatchesFormat('%s');
        ass('somestring')->stringNotMatchesFormat('%i');
    }

    public function testStringMatchesFormatFile(): void
    {
        $formatFile = TEST_FILES_PATH.'string_foobar.txt';

        ass('foo_bar')->stringMatchesFormatFile($formatFile);
        ass('string_not_matches')->stringNotMatchesFormatFile($formatFile);
    }

    public function testStringStartsWith(): void
    {
        ass('A completely not funny string')->stringStartsWith('A completely');
        ass('A completely not funny string')->stringStartsNotWith('string');
    }
}
