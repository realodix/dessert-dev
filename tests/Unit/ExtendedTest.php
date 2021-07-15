<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;

final class ExtendedTest extends TestCase
{
    public function testStringEqualsString(): void
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
        $stringFile  = TEST_FILES_PATH.'string_foobar.txt';
        ass('foo_bar')->stringEqualsFile($stringFile);
        ass('another_string')->stringNotEqualsFile($stringFile);

        // JSon
        $jsonFile = TEST_FILES_PATH.'json_simple_object.json';
        $jsonString = json_encode(['foo' => 'bar']);
        ass($jsonString)->stringEqualsFile($jsonFile);
        ass(json_encode(['foo' => 'baz']))->stringNotEqualsFile($jsonFile);

        // XML
        $xmlFoo = TEST_FILES_PATH.'xml_foo.xml';
        $xmlBar = TEST_FILES_PATH.'xml_bar.xml';
        ass('<foo/>')->stringEqualsFile($xmlFoo);
        ass('<foo/>')->stringNotEqualsFile($xmlBar);
    }
}
