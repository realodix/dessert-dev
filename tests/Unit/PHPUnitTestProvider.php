<?php

namespace Realodix\NextProject\Test;

trait PHPUnitTestProvider
{
    public function stringContainsStringIgnoringLineEndingsProvider(): array
    {
        return [
            ["b\nc", "b\r\nc"],
            ["b\nc", "a\r\nb\r\nc\r\nd"],
        ];
    }

    public function stringEqualIgnoringLineEndingsProvider(): array
    {
        return [
            'lf-crlf'   => ["a\nb", "a\r\nb"],
            'cr-crlf'   => ["a\rb", "a\r\nb"],
            'crlf-crlf' => ["a\r\nb", "a\r\nb"],
            'lf-cr'     => ["a\nb", "a\rb"],
            'cr-cr'     => ["a\rb", "a\rb"],
            'crlf-cr'   => ["a\r\nb", "a\rb"],
            'lf-lf'     => ["a\nb", "a\nb"],
            'cr-lf'     => ["a\rb", "a\nb"],
            'crlf-lf'   => ["a\r\nb", "a\nb"],
        ];
    }

    public function stringEqualIgnoringLineEndingsFailProvider(): array
    {
        return [
            ["a\nb", 'ab'],
            ["a\rb", 'ab'],
            ["a\r\nb", 'ab'],
        ];
    }
}