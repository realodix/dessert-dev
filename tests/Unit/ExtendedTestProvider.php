<?php

namespace Realodix\NextProject\Test;

trait ExtendedTestProvider
{
    /**
     * Data provider for test markupContainsSelector().
     */
    public function markupContainsSelectorProvider()
    {
        return [
            'Simple tag name'         => ['a'],
            'Class name'              => ['.link'],
            'Multiple class names'    => ['.link.another-class'],
            'Element ID'              => ['#my-link'],
            'Tag name with class'     => ['a.link'],
            'Tag name with ID'        => ['a#my-link'],
            'Tag with href attribute' => ['a[href="https://example.com"]'],
        ];
    }

    public function dataAssertStringContainsStringIgnoringLineEndings(): array
    {
        return [
            ["b\nc", "b\r\nc"],
            ["b\nc", "a\r\nb\r\nc\r\nd"],
        ];
    }

    public function dataAssertStringEqualIgnoringLineEndings(): array
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

    public function dataNotAssertStringEqualIgnoringLineEndings(): array
    {
        return [
            ["a\nb", 'ab'],
            ["a\rb", 'ab'],
            ["a\r\nb", 'ab'],
        ];
    }
}
