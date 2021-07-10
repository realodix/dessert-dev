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

        $this->assetsDir = __DIR__.DIRECTORY_SEPARATOR.'_files'.DIRECTORY_SEPARATOR;
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
        ass('testing 123')->stringEqualsFile($this->assetsDir.'StringEqualsFile.txt');
        ass('Another string')->stringNotEqualsFile($this->assetsDir.'StringEqualsFile.txt');

        ass('testing 123')
            ->stringEqualsFileCanonicalizing($this->assetsDir.'StringEqualsFile.txt');
        ass('notSame')
            ->stringNotEqualsFileCanonicalizing($this->assetsDir.'StringEqualsFile.txt');
        ass('TESTING 123')
            ->stringEqualsFileIgnoringCase($this->assetsDir.'StringEqualsFile.txt');
        ass('Test 123')
            ->stringNotEqualsFileIgnoringCase($this->assetsDir.'StringEqualsFile.txt');
    }

    public function testEqualsJsonFile(): void
    {
        $jsonFile = $this->assetsDir.'JsonData/simpleObject.json';

        ass($jsonFile)->jsonFileEqualsJsonFile($jsonFile);
        ass('{"Mascott":"Tux"}')->jsonStringEqualsJsonFile($jsonFile);
    }

    public function testEqualsJsonString(): void
    {
        $jsonString = '{"foo" : "bar"}';
        ass($jsonString)->jsonStringEqualsJsonString($jsonString);
    }

    public function testEqualsWithDelta(): void
    {
        ass(1.01)->equalsWithDelta(1.0, 0.1);
    }

    public function testEqualsXmlFile(): void
    {
        $xmlFile = $this->assetsDir.'xml-test-file.xml';

        ass($xmlFile)->xmlFileEqualsXmlFile($xmlFile);

        ass('<foo><bar>Baz</bar><bar>Baz</bar></foo>')->xmlStringEqualsXmlFile($xmlFile);
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

    public function testJson(): void
    {
        ass(json_encode(['foo' => 'bar']))->json();
    }

    public function testMatchesFormatFile(): void
    {
        $formatFile = $this->assetsDir.'StringEqualsFile.txt';

        ass('testing 123')->stringMatchesFormatFile($formatFile);
        ass('asdfas')->stringNotMatchesFormatFile($formatFile);
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

    public function testIsReadable(): void
    {
        ass($this->assetsDir.'StringEqualsFile.txt')->isReadable();

        $path = __DIR__ . \DIRECTORY_SEPARATOR . 'NotExisting.php';
        ass($path)->isNotReadable();
    }

    public function testIsWritable(): void
    {
        $path = $this->assetsDir.'StringEqualsFile.txt';
        ass($path)->isWritable();

        $path = __DIR__ . \DIRECTORY_SEPARATOR . 'NotExisting' . \DIRECTORY_SEPARATOR;
        ass($path)->isNotWritable();
    }
}

class FakeClassForTesting
{
    public static $staticProperty;
}
