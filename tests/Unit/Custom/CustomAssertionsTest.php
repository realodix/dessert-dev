<?php

namespace Realodix\Dessert\Test\Custom;

use PHPUnit\Framework\TestCase;

final class CustomAssertionsTest extends TestCase
{
    public function testHasLength()
    {
        ass([
            'Fortaleza', 'Sollefteå', 'Ιεράπετρα',
            (object) [1, 2, 3, 4, 5, 6, 7, 8, 9],
        ])
        ->each()
        ->hasLength(9);

        ass([1, 2, 3])->hasLength(3);
    }

    public function testNotHasLength()
    {
        ass([
            'Fortaleza', 'Sollefteå', 'Ιεράπετρα',
            (object) [1, 2, 3, 4, 5, 6, 7, 8, 9],
        ])
        ->each()
        ->notHasLength(1);

        ass([1, 2, 3])->notHasLength(1);
    }

    public function testHasLengthError()
    {
        $this->expectException(\BadMethodCallException::class);
        ass([1, 1.5, true, null])->each->hasLength(1);
    }

    public function testStringEquals(): void
    {
        ass('hello')
            ->stringEquals('hello')
            ->stringNotEquals('string');

        // JSon
        $jsonString = json_encode(['foo' => 'bar']);
        ass($jsonString)
            ->stringEquals($jsonString)
            ->stringNotEquals(json_encode(['foo' => 'baz']));

        // XML
        $xmlString = '<foo/>';
        ass($xmlString)
            ->stringEquals($xmlString)
            ->stringNotEquals('<bar/>');
    }

    public function testFileEqualsString(): void
    {
        $xmlFile = TEST_FILES_PATH.'xml_foo.xml';

        ass($xmlFile)
            ->fileEqualsString('<foo/>')
            ->fileNotEqualsString('<FOO/>');
    }

    public function testFileEqualsStringIgnoringCase(): void
    {
        $xmlFile = TEST_FILES_PATH.'xml_foo.xml';

        ass($xmlFile)
            ->fileEqualsStringIgnoringCase('<FOO/>')
            ->fileNotEqualsStringIgnoringCase('<bar/>');
    }
}
