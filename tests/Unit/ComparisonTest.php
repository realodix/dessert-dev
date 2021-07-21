<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\AssertionFailedError;

final class ComparisonTest extends TestCase
{
    public function testContainsEquals(): void
    {
        $a = new \stdClass;
        $a->foo = 'bar';

        $b = new \stdClass;
        $b->foo = 'baz';

        ass([$a])->containsEquals($a);
        ass([$a])->notContainsEquals($b);

        try {
            ass([$a])->containsEquals($b);
        } catch (AssertionFailedError $e) {
            return;
        }

        $this->fail();
    }

    public function testEquals(): void
    {
        ass(5)->equals(5);
        ass('hello')->equals('hello');
        ass(5)->equals(5, 'user have 5 posts');

        ass(3)->notEquals(5);
    }

    public function testEqualsCanonicalizing(): void
    {
        ass([3, 2, 1])
            ->equalsCanonicalizing([1, 2, 3])
            ->notEqualsCanonicalizing([2, 3, 0, 1]);
    }

    public function testEqualsIgnoringCase(): void
    {
        ass('foo')
            ->equalsIgnoringCase('FOO')
            ->notEqualsIgnoringCase('BAR');
    }

    public function testEqualsWithDelta(): void
    {
        ass(1.01)->equalsWithDelta(1.0, 0.1);
        ass(3.251)->equalsWithDelta(3.25, 0.01);
        ass(3.251)->equalsWithDelta(3.25, 0.01, 'respects delta');

        ass(1.2)->notEqualsWithDelta(1.0, 0.1);
        ass(3.252)->notEqualsWithDelta(3.25, 0.001);
        ass(3.252)->notEqualsWithDelta(3.25, 0.001, 'respects delta');
    }

    public function testFalse(): void
    {
        ass(false)->false();
        ass(true)->notFalse();
    }

    public function testFileEquals(): void
    {
        ass(__FILE__)
            ->fileEquals(__FILE__)
            ->fileNotEquals(
                TEST_FILES_PATH.'string_foobar.txt'
            );
    }

    public function testFileEqualsCanonicalizing()
    {
        $actual = TEST_FILES_PATH.'string_foobar.txt';
        $expected = TEST_FILES_PATH.'string_foobar_upper.txt';

        ass($actual)
            ->fileEqualsCanonicalizing($actual)
            ->fileNotEqualsCanonicalizing($expected);
    }

    public function testFileEqualsIgnoringCase()
    {
        $file1 = TEST_FILES_PATH.'string_foobar.txt';
        $file2 = TEST_FILES_PATH.'string_foobar_upper.txt';
        $file3 = TEST_FILES_PATH.'string_foobaz.txt';

        ass($file1)->fileEqualsIgnoringCase($file2);
        ass($file3)->fileNotEqualsIgnoringCase($file1);
    }

    public function testGreaterThan(): void
    {
        ass(7)
            ->greaterThan(5)
            ->greaterThanOrEqual(7)
            ->greaterThanOrEqual(5);
    }

    public function testJsonFileEqualsJsonFile(): void
    {
        $fileExpected = TEST_FILES_PATH.'json_array_object.json';
        $fileActual = TEST_FILES_PATH.'json_simple_object.json';

        ass($fileActual)
            ->jsonFileToFile($fileActual)
            ->jsonFileNotToFile($fileExpected);
    }

    public function testJsonStringEqualsJsonFile(): void
    {
        $jsonFile = TEST_FILES_PATH.'json_simple_object.json';
        $jsonString = json_encode(['foo' => 'bar']);

        ass($jsonString)->jsonStringToFile($jsonFile);
        ass(json_encode(['foo' => 'baz']))->jsonStringNotToFile($jsonFile);
    }

    public function testJsonStringEqualsJsonString(): void
    {
        $jsonString = json_encode(['foo' => 'bar']);

        ass($jsonString)
            ->jsonStringToString($jsonString)
            ->jsonStringNotToString(json_encode(['foo' => 'baz']));
    }

    public function testLessThan(): void
    {
        ass(7)->lessThan(10)
              ->lessThanOrEqual(7)
              ->lessThanOrEqual(8);
    }

    public function testNull(): void
    {
        ass(null)->null();
        ass(true)->notNull();
    }

    public function testSame(): void
    {
        ass(1)->same(0 + 1)
              ->notSame(true);
    }

    public function testSameSize(): void
    {
        ass([1, 2])
            ->sameSize([1, 2])
            ->notSameSize([1, 2, 3]);
    }

    public function testStringEqualsFileCanonicalizing(): void
    {
        ass('foo_bar')
            ->stringEqualsFileCanonicalizing(TEST_FILES_PATH.'string_foobar.txt');
        ass('notSame')
            ->stringNotEqualsFileCanonicalizing(TEST_FILES_PATH.'string_foobar.txt');
    }

    public function testStringEqualsFileIgnoringCase(): void
    {
        ass('FOO_BAR')
            ->stringEqualsFileIgnoringCase(TEST_FILES_PATH.'string_foobar.txt');
        ass('Test 123')
            ->stringNotEqualsFileIgnoringCase(TEST_FILES_PATH.'string_foobar.txt');
    }

    public function testTrue(): void
    {
        ass(true)->true();
        ass(false)->notTrue();
    }

    public function testXmlFileEqualsXmlFile(): void
    {
        $actual = TEST_FILES_PATH.'xml_foo.xml';
        $expected = TEST_FILES_PATH.'xml_bar.xml';

        ass($actual)
            ->xmlFileToFile($actual)
            ->xmlFileNotToFile($expected);
    }

    public function testXmlStringEqualsXmlFile(): void
    {
        $xmlFoo = TEST_FILES_PATH.'xml_foo.xml';
        $xmlBar = TEST_FILES_PATH.'xml_bar.xml';

        ass('<foo/>')
            ->xmlStringToFile($xmlFoo)
            ->xmlStringNotToFile($xmlBar);
    }

    public function testXmlStringEqualsXmlString(): void
    {
        ass('<foo/>')
            ->xmlStringToString('<foo/>')
            ->xmlStringNotToString('<bar/>');
    }
}
