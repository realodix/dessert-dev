<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;

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

    public function testClassHasAttribute(): void
    {
        ass('Exception')->classHasAttribute('message');
        ass('Exception')->classNotHasAttribute('fakeproperty');

        if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
            $testObject = (object) ['existingAttribute' => true];
            ass($testObject)->objectNotHasAttribute('fakeproperty');
            ass($testObject)->objectHasAttribute('existingAttribute');
        }
    }

    public function testClassHasStaticAttribute(): void
    {
        ass(FakeClassForTesting::class)->classHasStaticAttribute('staticProperty');
        ass(FakeClassForTesting::class)->classNotHasStaticAttribute('fakeProperty');
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

        ass(3)->notEquals(5);
    }

    public function testEqualsCanonicalizing(): void
    {
        ass([3, 2, 1])->equalsCanonicalizing([1, 2, 3]);

        ass([3, 2, 1])->notEqualsCanonicalizing([2, 3, 0, 1]);
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

    public function testFinite(): void
    {
        ass(1)->finite();
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

    public function testInfinite(): void
    {
        ass(INF)->infinite();
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

    public function testJsonEqualsJsonFile(): void
    {
        $jsonFile = $this->assetsDir.'JsonData/simpleObject.json';

        ass($jsonFile)->jsonFileEqualsJsonFile($jsonFile);
        ass('{"Mascott":"Tux"}')->jsonStringEqualsJsonFile($jsonFile);
    }

    public function testJsonStringEqualsJsonString(): void
    {
        $jsonString = '{"foo" : "bar"}';
        ass($jsonString)->jsonStringEqualsJsonString($jsonString);
    }

    public function testNan(): void
    {
        ass(NAN)->nan();
    }

    public function testSame(): void
    {
        ass(1)->same(0 + 1);
        ass(1)->notSame(true);
    }

    public function testStringEqualsFile(): void
    {
        ass('testing 123')->stringEqualsFile($this->assetsDir.'StringEqualsFile.txt');
        ass('Another string')->stringNotEqualsFile($this->assetsDir.'StringEqualsFile.txt');
    }

    public function testStringEqualsFileCanonicalizing(): void
    {
        ass('testing 123')
            ->stringEqualsFileCanonicalizing($this->assetsDir.'StringEqualsFile.txt');
        ass('notSame')
            ->stringNotEqualsFileCanonicalizing($this->assetsDir.'StringEqualsFile.txt');
    }

    public function testStringEqualsFileIgnoringCase(): void
    {
        ass('TESTING 123')
            ->stringEqualsFileIgnoringCase($this->assetsDir.'StringEqualsFile.txt');
        ass('Test 123')
            ->stringNotEqualsFileIgnoringCase($this->assetsDir.'StringEqualsFile.txt');
    }

    public function testStringMatchesFormatFile(): void
    {
        $formatFile = $this->assetsDir.'StringEqualsFile.txt';

        ass('testing 123')->stringMatchesFormatFile($formatFile);
        ass('asdfas')->stringNotMatchesFormatFile($formatFile);
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
