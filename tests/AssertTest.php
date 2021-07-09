<?php

namespace Realodix\NextProject\Test;

use Exception;
use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\ExpectationFailedException;
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

    public function testArrayContains(): void
    {
        ass([3, 2])->arrayContains(3);
        ass([3, 2])->arrayNotContains(5, 'user have 5 posts');
    }

    public function testArrayContainsOnly(): void
    {
        ass(['1', '2', '3'])->arrayContainsOnly('string');
        ass(['1', '2', 3])->arrayNotContainsOnly('string');
    }

    public function testArrayContainsOnlyInstancesOf(): void
    {
        $array = [
            new FakeClassForTesting(),
            new FakeClassForTesting(),
            new FakeClassForTesting(),
        ];

        ass($array)->arrayContainsOnlyInstancesOf(FakeClassForTesting::class);
    }

    public function testArrayCount(): void
    {
        ass([1, 2, 3])->arrayCount(3);
        ass([1, 2, 3])->arrayNotCount(2);
    }

    public function testArrayHasKey(): void
    {
        $errors = ['title' => 'You should add title'];
        ass($errors)->arrayHasKey('title');
        ass($errors)->arrayNotHasKey('body');
    }

    public function testDirectory(): void
    {
        ass(__DIR__)->directoryIsReadable();
        $this->expectException(AssertionFailedError::class);
        ass(__DIR__.DIRECTORY_SEPARATOR.'NotExisting')->directoryIsReadable();

        ass(__DIR__.DIRECTORY_SEPARATOR.'NotExisting')->directoryDoesNotExist();
        $this->expectException(AssertionFailedError::class);
        ass(__DIR__)->directoryDoesNotExist();
    }

    public function testDoesNotThrow(): void
    {
        $func = function (): void {
            throw new Exception('foo');
        };

        ass(function (): void {
        })->callableDoesNotThrow();

        ass($func)->callableDoesNotThrow(\RuntimeException::class);
        ass($func)->callableDoesNotThrow(\RuntimeException::class, 'bar');
        ass($func)->callableDoesNotThrow(\RuntimeException::class, 'foo');
        ass($func)->callableDoesNotThrow(new \RuntimeException());
        ass($func)->callableDoesNotThrow(new \RuntimeException('bar'));
        ass($func)->callableDoesNotThrow(new \RuntimeException('foo'));
        ass($func)->callableDoesNotThrow(Exception::class, 'bar');
        ass($func)->callableDoesNotThrow(new Exception('bar'));

        ass(function () use ($func): void {
            ass($func)->callableDoesNotThrow();
        })->callableThrows(new ExpectationFailedException('exception was not expected to be thrown'));

        ass(function () use ($func): void {
            ass($func)->callableDoesNotThrow(Exception::class);
        })->callableThrows(new ExpectationFailedException("exception 'Exception' was not expected to be thrown"));

        ass(function () use ($func): void {
            ass($func)->callableDoesNotThrow(Exception::class, 'foo');
        })->callableThrows(new ExpectationFailedException("exception 'Exception' with message 'foo' was not expected to be thrown"));
    }

    public function testEmptyNotEmpty(): void
    {
        ass(['3', '5'])->notEmpty();
        ass([])->empty();
    }

    public function testEndsWith(): void
    {
        ass('A completely not funny string')->stringEndsWith('ny string');
        ass('A completely not funny string')->stringEndsNotWith('A completely');
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

    public function testEqualsIgnoringCase(): void
    {
        ass('foo')->equalsIgnoringCase('FOO');
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
        ass('completelyrandomfilename.txt')->fileDoesNotExists();
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

    public function testIsArray(): void
    {
        ass([1, 2, 3])->isArray();
        ass(false)->isNotArray();
    }

    public function testIsBool(): void
    {
        ass(false)->isBool();
        ass([1, 2, 3])->isNotBool();
    }

    public function testIsCallable(): void
    {
        ass(function (): void {
        })->isCallable();

        ass(false)->isNotCallable();
    }

    public function testIsFloat(): void
    {
        ass(1.5)->isFloat();
        ass(1)->isNotFloat();
    }

    public function testIsInstanceOf(): void
    {
        $testClass = new \DateTime();
        ass($testClass)->instanceOf('DateTime');
        ass($testClass)->notInstanceOf('DateTimeZone');
    }

    public function testIsInt(): void
    {
        ass(5)->isInt();
        ass(1.5)->isNotInt();
    }

    public function testIsNumeric(): void
    {
        ass('1.5')->isNumeric();
        ass('foo bar')->isNotNumeric();
    }

    public function testIsObject(): void
    {
        ass(new \stdClass)->isObject();
        ass(false)->isNotObject();
    }

    public function testIsResource(): void
    {
        ass(fopen(__FILE__, 'r'))->isResource();
        ass(false)->isNotResource();
    }

    public function testIsScalar(): void
    {
        ass('foo bar')->isScalar();
        ass([1, 2, 3])->isNotScalar();
    }

    public function testIsString(): void
    {
        ass('foo bar')->isString();
        ass(false)->isNotString();
    }

    public function testMatchesFormat(): void
    {
        ass('somestring')->stringMatchesFormat('%s');
        ass('somestring')->stringNotMatchesFormat('%i');
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

    public function testNotEqualsIgnoringCase(): void
    {
        ass('foo')->notEqualsIgnoringCase('BAR');
    }

    public function testNotEqualsWithDelta(): void
    {
        ass(1.2)->notEqualsWithDelta(1.0, 0.1);
    }

    public function testRegExp(): void
    {
        ass('foobar')->matchesRegExp('/foobar/');
        ass('foobar')->doesNotMatchRegExp('/foobarbaz/');
    }

    public function testSame(): void
    {
        ass(1)->same(0 + 1);
        ass(1)->notSame(true);
    }

    public function testStartsWith(): void
    {
        ass('A completely not funny string')->stringStartsWith('A completely');
        ass('A completely not funny string')->stringStartsNotWith('string');
    }

    public function testStringContainsString(): void
    {
        ass('foo bar')->stringContainsString('o b');
        ass('foo bar')->stringNotContainsString('BAR');
    }

    public function testStringContainsStringIgnoringCase(): void
    {
        ass('foo bar')->stringContainsStringIgnoringCase('O b');
        ass('foo bar')->stringNotContainsStringIgnoringCase('baz');
    }

    public function testThrows(): void
    {
        $func = function (): void {
            throw new Exception('foo');
        };

        ass($func)->callableThrows();
        ass($func)->callableThrows(Exception::class);
        ass($func)->callableThrows(Exception::class, 'foo');
        ass($func)->callableThrows(new Exception());
        ass($func)->callableThrows(new Exception('foo'));

        ass(function () use ($func): void {
            ass($func)->callableThrows(\RuntimeException::class);
        })->callableThrows(ExpectationFailedException::class);

        ass(function (): void {
            ass(function (): void {
            })->callableThrows(Exception::class);
        })->callableThrows(new ExpectationFailedException("exception 'Exception' was not thrown as expected"));
    }

    public function testTrueFalseNull(): void
    {
        ass(true)->true();
        ass(false)->false();
        ass(null)->null();
        ass(true)->notNull();
        ass(false)->false('something should be false');
        ass(true)->true('something should be true');
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
