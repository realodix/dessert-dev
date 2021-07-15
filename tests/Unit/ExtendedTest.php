<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;

final class ExtendedTest extends TestCase
{
    public function testStringEqualsString(): void
    {
        ass('hello')->stringEqualsString('hello');

        // JSon
        $jsonString = json_encode(['foo' => 'bar']);
        ass($jsonString)->stringEqualsString($jsonString);

        // XML
        $xmlString = '<foo/>';
        ass($xmlString)->stringEqualsString($xmlString);
    }
}
