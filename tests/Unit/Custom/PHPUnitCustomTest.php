<?php

namespace Realodix\Dessert\Test\Custom;

use PHPUnit\Framework\TestCase;

final class PHPUnitCustomTest extends TestCase
{
    public function testContains(): void
    {
        // Array
        ass([3, 2])
            ->contains(3)->toBeIn(3)
            ->notContains(5, 'user have 5 posts');

        // String
        ass('foo bar')
            ->contains('o b')->toBeIn('o b')
            ->notContains('BAR');
    }

    public function testStringEqualsFile(): void
    {
        $stringFile = TEST_FILES_PATH . 'string_foobar.txt';
        ass('foo_bar')
            ->stringEqualsFile($stringFile)
            ->and('another_string')
                ->stringNotEqualsFile($stringFile);

        // JSon
        $jsonFile = TEST_FILES_PATH . 'json_simple_object.json';
        $jsonString = json_encode(['foo' => 'bar']);
        ass($jsonString)
            ->stringEqualsFile($jsonFile)
            ->and(json_encode(['foo' => 'baz']))
                ->stringNotEqualsFile($jsonFile);

        // XML
        $xmlFoo = TEST_FILES_PATH . 'xml_foo.xml';
        $xmlBar = TEST_FILES_PATH . 'xml_bar.xml';
        ass('<foo/>')
            ->stringEqualsFile($xmlFoo)
            ->stringNotEqualsFile($xmlBar);
    }
}
