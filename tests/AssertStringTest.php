<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;

final class AssertStringTest extends TestCase
{
    /** @test */
    public function containsString(): void
    {
        ass('foo bar')->stringContainsString('o b');
        ass('foo bar')->stringNotContainsString('BAR');

        ass('foo bar')->stringContainsStringIgnoringCase('O b');
        ass('foo bar')->stringNotContainsStringIgnoringCase('baz');
    }

    /** @test */
    public function endsWith(): void
    {
        ass('A completely not funny string')->stringEndsWith('ny string');
        ass('A completely not funny string')->stringEndsNotWith('A completely');
    }

    /** @test */
    public function startsWith(): void
    {
        ass('A completely not funny string')->stringStartsWith('A completely');
        ass('A completely not funny string')->stringStartsNotWith('string');
    }

    public function testEqualsIgnoringCase(): void
    {
        ass('foo')->equalsIgnoringCase('FOO');
        ass('foo')->notEqualsIgnoringCase('BAR');
    }

    public function testMatchesFormat(): void
    {
        ass('somestring')->stringMatchesFormat('%s');
        ass('somestring')->stringNotMatchesFormat('%i');
    }

    public function testMatchesRegularExpression(): void
    {
        ass('foobar')->matchesRegularExpression('/foobar/');
        ass('foobar')->doesNotMatchRegularExpression('/foobarbaz/');
    }
}
