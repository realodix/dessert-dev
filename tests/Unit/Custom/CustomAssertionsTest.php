<?php

namespace Realodix\Dessert\Test\Custom;

use PHPUnit\Framework\TestCase;
use Realodix\Dessert\Exceptions\InvalidActualValue;

final class CustomAssertionsTest extends TestCase
{
    public function testHasLength()
    {
        verify([
            'Fortaleza', 'Sollefteå', 'Ιεράπετρα',
            (object) [1, 2, 3, 4, 5, 6, 7, 8, 9],
        ])
        ->each()
        ->hasLength(9);

        verify([1, 2, 3])->hasLength(3);
    }

    public function testNotHasLength()
    {
        verify([
            'Fortaleza', 'Sollefteå', 'Ιεράπετρα',
            (object) [1, 2, 3, 4, 5, 6, 7, 8, 9],
        ])
        ->each()
        ->notHasLength(1);

        verify([1, 2, 3])->notHasLength(1);
    }

    public function testHasLengthError()
    {
        $this->expectException(InvalidActualValue::class);
        verify([1, 1.5, true, null])->each->hasLength(1);
    }

    public function testStringEquals(): void
    {
        verify('hello')
            ->stringEquals('hello')
            ->stringNotEquals('string');

        // JSon
        $jsonString = json_encode(['foo' => 'bar']);
        verify($jsonString)
            ->stringEquals($jsonString)
            ->stringNotEquals(json_encode(['foo' => 'baz']));

        // XML
        $xmlString = '<foo/>';
        verify($xmlString)
            ->stringEquals($xmlString)
            ->stringNotEquals('<bar/>');
    }

    public function testFileEqualsString(): void
    {
        $xmlFile = TEST_FILES_PATH . 'xml_foo.xml';

        verify($xmlFile)
            ->fileEqualsString('<foo/>')
            ->fileNotEqualsString('<FOO/>');
    }

    public function testFileEqualsStringIgnoringCase(): void
    {
        $xmlFile = TEST_FILES_PATH . 'xml_foo.xml';

        verify($xmlFile)
            ->fileEqualsStringIgnoringCase('<FOO/>')
            ->fileNotEqualsStringIgnoringCase('<bar/>');
    }
}
