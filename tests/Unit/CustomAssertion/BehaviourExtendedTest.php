<?php

namespace Realodix\NextProject\Test\CustomAssertion;

use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;

final class BehaviourExtendedTest extends TestCase
{
    public function testArrayHasKey(): void
    {
        $test_array = [
            'a' => 'foo',
            'b' => [
                'c' => 'bar',
            ],
            'key.with.dots' => false,
        ];

        ass($test_array)
            ->hasKey('a')
            ->hasKey('b.c')
            ->hasKey('key.with.dots')
            ->hasKey('a', 'foo')
            ->hasKey('b.c', 'bar')
            ->hasKey('key.with.dots', false);

        $this->expectException(ExpectationFailedException::class);

        ass($test_array)->hasKey('foo');
    }

    public function testArrayNotHasKey(): void
    {
        $test_array = [
            'a' => 'foo',
            'b' => [
                'c' => 'bar',
            ],
            'key.with.dots' => false,
        ];

        ass($test_array)
            ->notHasKey('x')
            ->notHasKey('b.x')
            ->notHasKey('key.with.x')
            ->notHasKey('x', 'foo')
            ->notHasKey('b.x', 'bar')
            ->notHasKey('key.with.x', true);

        $this->expectException(ExpectationFailedException::class);

        ass($test_array)->notHasKey('key.with.dots');
    }

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
