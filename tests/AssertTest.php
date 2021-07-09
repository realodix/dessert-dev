<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\TestCase;

// Coba dibuat, ditemukan pada test Dir
// $this->expectException(AssertionFailedError::class);

final class AssertTest extends TestCase
{
    /** @var DOMDocument */
    protected $xml;

    protected function setUp(): void
    {
        $this->xml = new \DOMDocument;
        $this->xml->loadXML('<foo><bar>Baz</bar><bar>Baz</bar></foo>');
    }

    public function testDirectory(): void
    {
        ass(__DIR__)->directoryIsReadable();
        $this->expectException(AssertionFailedError::class);
        ass(__DIR__.DIRECTORY_SEPARATOR.'NotExisting')->directoryIsReadable();
    }

    public function testEmptyNotEmpty(): void
    {
        ass(['3', '5'])->notEmpty();
        ass([])->empty();
    }

    public function testEquals(): void
    {
        ass(5)->equals(5);
        ass('hello')->equals('hello');
        ass(5)->equals(5, 'user have 5 posts');
        ass(3.251)->equalsWithDelta(3.25, 0.01);
        ass(3.251)->equalsWithDelta(3.25, 0.01, 'respects delta');

        ass(__FILE__)->fileEquals(__FILE__);
    }

    public function testEqualsCanonicalizing(): void
    {
        ass([3, 2, 1])->equalsCanonicalizing([1, 2, 3]);
    }

    public function testEqualsFile(): void
    {
        ass('%i')->stringEqualsFile(__DIR__.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'format-file.txt');
        ass('Another string')->stringNotEqualsFile(__DIR__.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'format-file.txt');
    }

    public function testEqualsJsonFile(): void
    {
        ass(__DIR__.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'json-test-file.json')
            ->jsonFileEqualsJsonFile(__DIR__.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'equal-json-test-file.json');
        ass('{"some" : "data"}')->jsonStringEqualsJsonFile(__DIR__.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'equal-json-test-file.json');
    }

    public function testEqualsJsonString(): void
    {
        ass('{"some" : "data"}')->jsonStringEqualsJsonString('{"some" : "data"}');
    }

    public function testEqualsWithDelta(): void
    {
        ass(1.01)->equalsWithDelta(1.0, 0.1);
    }

    public function testEqualsXmlFile(): void
    {
        ass(__DIR__.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'xml-test-file.xml')
            ->xmlFileEqualsXmlFile(__DIR__.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'xml-test-file.xml');
        ass('<foo><bar>Baz</bar><bar>Baz</bar></foo>')
            ->xmlStringEqualsXmlFile(__DIR__.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'xml-test-file.xml');
    }

    public function testEqualsXmlString(): void
    {
        ass('<foo><bar>Baz</bar><bar>Baz</bar></foo>')
            ->xmlStringEqualsXmlString('<foo><bar>Baz</bar><bar>Baz</bar></foo>');
    }

    public function testFileExists(): void
    {
        ass(__FILE__)->fileExists();
        ass('completelyrandomfilename.txt')->fileDoesNotExist();
    }

    public function testGreaterLowerThan(): void
    {
        ass(7)->greaterThan(5);
        ass(7)->lessThan(10);
        ass(7)->lessThanOrEqual(7);
        ass(7)->lessThanOrEqual(8);
        ass(7)->greaterThanOrEqual(7);
        ass(7)->greaterThanOrEqual(5);
    }

    public function testHasAttribute(): void
    {
        ass('Exception')->classHasAttribute('message');
        ass('Exception')->classNotHasAttribute('fakeproperty');

        if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
            $testObject = (object) ['existingAttribute' => true];
            ass($testObject)->objectNotHasAttribute('fakeproperty');
            ass($testObject)->objectHasAttribute('existingAttribute');
        }
    }

    public function testHasStaticAttribute(): void
    {
        ass(FakeClassForTesting::class)->classHasStaticAttribute('staticProperty');
        ass(FakeClassForTesting::class)->classNotHasStaticAttribute('fakeProperty');
    }

    public function testIsInstanceOf(): void
    {
        $testClass = new \DateTime();
        ass($testClass)->instanceOf('DateTime');
        ass($testClass)->notInstanceOf('DateTimeZone');
    }

    public function testMatchesFormatFile(): void
    {
        ass('23')->stringMatchesFormatFile(
            __DIR__.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'format-file.txt'
        );

        ass('asdfas')->stringNotMatchesFormatFile(
            __DIR__.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'format-file.txt'
        );
    }

    public function testNotEquals(): void
    {
        ass(3)->notEquals(5);
        ass(3.252)->notEqualsWithDelta(3.25, 0.001);
        ass(3.252)->notEqualsWithDelta(3.25, 0.001, 'respects delta');

        ass(__FILE__)->fileNotEquals(
            __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'composer.json'
        );
    }

    public function testNotEqualsCanonicalizing(): void
    {
        ass([3, 2, 1])->notEqualsCanonicalizing([2, 3, 0, 1]);
    }

    public function testNotEqualsWithDelta(): void
    {
        ass(1.2)->notEqualsWithDelta(1.0, 0.1);
    }

    public function testSame(): void
    {
        ass(1)->same(0 + 1);
        ass(1)->notSame(true);
    }

    public function testVariants(): void
    {
        expect([])->empty();
        should([])->empty();
        verify([])->empty();
    }
}

class FakeClassForTesting
{
    public static $staticProperty;
}
