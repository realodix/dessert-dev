<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;

final class StringTest extends TestCase
{
    protected function setUp(): void
    {
        $this->assetsDir = __DIR__.DIRECTORY_SEPARATOR.'_files'.DIRECTORY_SEPARATOR;
    }

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

    public function testStringMatchesFormatFile(): void
    {
        $formatFile = $this->assetsDir.'StringEqualsFile.txt';

        ass('testing 123')->stringMatchesFormatFile($formatFile);
        ass('asdfas')->stringNotMatchesFormatFile($formatFile);
    }
}
