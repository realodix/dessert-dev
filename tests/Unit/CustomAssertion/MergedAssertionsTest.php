<?php

namespace Realodix\NextProject\Test\CustomAssertion;

use PHPUnit\Framework\TestCase;

final class MergedAssertionsTest extends TestCase
{
    public function testContains(): void
    {
        // Array
        ass([3, 2])
            ->contains(3)
            ->notContains(5, 'user have 5 posts');

        // String
        ass('foo bar')
            ->contains('o b')
            ->notContains('BAR');
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

    public function testStringEqualsFile(): void
    {
        $stringFile = TEST_FILES_PATH.'string_foobar.txt';
        ass('foo_bar')
            ->stringEqualsFile($stringFile)
            ->and('another_string')
                ->stringNotEqualsFile($stringFile);

        // JSon
        $jsonFile = TEST_FILES_PATH.'json_simple_object.json';
        $jsonString = json_encode(['foo' => 'bar']);
        ass($jsonString)
            ->stringEqualsFile($jsonFile)
            ->and(json_encode(['foo' => 'baz']))
                ->stringNotEqualsFile($jsonFile);

        // XML
        $xmlFoo = TEST_FILES_PATH.'xml_foo.xml';
        $xmlBar = TEST_FILES_PATH.'xml_bar.xml';
        ass('<foo/>')
            ->stringEqualsFile($xmlFoo)
            ->stringNotEqualsFile($xmlBar);
    }
}
