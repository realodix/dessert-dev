<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;

final class ExtendedTest extends TestCase
{
    public function testStringEqualsString(): void
    {
        ass('hello')
            ->stringEqualsString('hello')
            ->stringNotEqualsString('string');

        // JSon
        $jsonString = json_encode(['foo' => 'bar']);
        ass($jsonString)
            ->stringEqualsString($jsonString)
            ->stringNotEqualsString(json_encode(['foo' => 'baz']));

        // XML
        $xmlString = '<foo/>';
        ass($xmlString)
            ->stringEqualsString($xmlString)
            ->stringNotEqualsString('<bar/>');
    }
}
