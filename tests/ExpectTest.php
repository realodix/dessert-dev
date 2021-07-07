<?php

namespace Realodix\NextProject\Test;

use Exception;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;

final class ExpectTest extends TestCase
{
    /** @var DOMDocument */
    protected $xml;

    protected function setUp(): void
    {
        $this->xml = new \DOMDocument;
        $this->xml->loadXML('<foo><bar>Baz</bar><bar>Baz</bar></foo>');
    }

    public function testArrayToHaveKey(): void
    {
        $errors = ['title' => 'You should add title'];
        expect($errors)->arrayToHaveKey('title');
        expect($errors)->arrayNotToHaveKey('body');
    }

    public function testContains(): void
    {
        expect([3, 2])->arrayToContain(3);
        expect([3, 2])->arrayNotToContain(5, 'user have 5 posts');
    }

    public function testContainsOnly(): void
    {
        expect(['1', '2', '3'])->arrayToContainOnly('string');
        expect(['1', '2', 3])->arrayNotToContainOnly('string');
    }

    public function testContainsOnlyInstancesOf(): void
    {
        $array = [
            new FakeClassForExpectTest(),
            new FakeClassForExpectTest(),
            new FakeClassForExpectTest(),
        ];

        expect($array)->arrayToContainOnlyInstancesOf(FakeClassForExpectTest::class);
    }

    public function testCount(): void
    {
        expect([1, 2, 3])->arrayToHaveCount(3);
        expect([1, 2, 3])->arrayNotToHaveCount(2);
    }

    public function testDoesNotThrow(): void
    {
        $func = function (): void {
            throw new Exception('foo');
        };

        expect(function (): void {
        })->callableNotToThrow();
        expect($func)->callableNotToThrow(\RuntimeException::class);
        expect($func)->callableNotToThrow(\RuntimeException::class, 'bar');
        expect($func)->callableNotToThrow(\RuntimeException::class, 'foo');
        expect($func)->callableNotToThrow(new \RuntimeException());
        expect($func)->callableNotToThrow(new \RuntimeException('bar'));
        expect($func)->callableNotToThrow(new \RuntimeException('foo'));
        expect($func)->callableNotToThrow(Exception::class, 'bar');
        expect($func)->callableNotToThrow(new Exception('bar'));

        expect(function () use ($func): void {
            expect($func)->callableNotToThrow();
        })->callableToThrow(new ExpectationFailedException('exception was not expected to be thrown'));

        expect(function () use ($func): void {
            expect($func)->callableNotToThrow(Exception::class);
        })->callableToThrow(new ExpectationFailedException("exception 'Exception' was not expected to be thrown"));

        expect(function () use ($func): void {
            expect($func)->callableNotToThrow(Exception::class, 'foo');
        })->callableToThrow(new ExpectationFailedException("exception 'Exception' with message 'foo' was not expected to be thrown"));
    }

    public function testEmptyNotEmpty(): void
    {
        expect(['3', '5'])->notToBeEmpty();
        expect([])->toBeEmpty();
    }

    public function testEndsWith(): void
    {
        expect('A completely not funny string')->stringToEndWith('ny string');
        expect('A completely not funny string')->stringNotToEndWith('A completely');
    }

    public function testToEqual(): void
    {
        expect(5)->toEqual(5);
        expect('hello')->toEqual('hello');
        expect(5)->toEqual(5, 'user have 5 posts');
        expect(3.251)->toEqualWithDelta(3.25, 0.01);
        expect(3.251)->toEqualWithDelta(3.25, 0.01, 'respects delta');
        expect(__FILE__)->fileToBeEqual(__FILE__);
    }

    public function testToEqualCanonicalizing(): void
    {
        expect([3, 2, 1])->toEqualCanonicalizing([1, 2, 3]);
    }

    public function testToEqualFile(): void
    {
        expect('%i')->stringtoEqualFile(__DIR__.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'format-file.txt');
        expect('Another string')->stringNottoEqualFile(__DIR__.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'format-file.txt');
    }

    public function testToEqualIgnoringCase(): void
    {
        expect('foo')->toEqualIgnoringCase('FOO');
    }

    public function testToEqualJsonFile(): void
    {
        expect(__DIR__.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'json-test-file.json')
            ->jsonFiletoEqualJsonFile(__DIR__.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'equal-json-test-file.json');
        expect('{"some" : "data"}')->jsonStringtoEqualJsonFile(__DIR__.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'equal-json-test-file.json');
    }

    public function testToEqualJsonString(): void
    {
        expect('{"some" : "data"}')->jsonStringtoEqualJsonString('{"some" : "data"}');
    }

    public function testToEqualWithDelta(): void
    {
        expect(1.01)->toEqualWithDelta(1.0, 0.1);
    }

    public function testToEqualXmlFile(): void
    {
        expect(__DIR__.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'xml-test-file.xml')
            ->xmlFiletoEqualXmlFile(__DIR__.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'xml-test-file.xml');
        expect('<foo><bar>Baz</bar><bar>Baz</bar></foo>')
            ->xmlStringtoEqualXmlFile(__DIR__.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'xml-test-file.xml');
    }

    public function testToEqualXmlString(): void
    {
        expect('<foo><bar>Baz</bar><bar>Baz</bar></foo>')
            ->xmlStringtoEqualXmlString('<foo><bar>Baz</bar><bar>Baz</bar></foo>');
    }

    public function testFileExists(): void
    {
        expect(__FILE__)->fileToExist();
        expect('completelyrandomfilename.txt')->fileNotToExist();
    }

    public function testGreaterLowerThan(): void
    {
        expect(7)->toBeGreaterThan(5);
        expect(7)->toBeLessThan(10);
        expect(7)->toBeLessThanOrEqualTo(7);
        expect(7)->toBeLessThanOrEqualTo(8);
        expect(7)->toBeGreaterThanOrEqualTo(7);
        expect(7)->toBeGreaterThanOrEqualTo(5);
    }

    public function testHasAttribute(): void
    {
        expect('Exception')->classToHaveAttribute('message');
        expect('Exception')->classNotToHaveAttribute('fakeproperty');

        $testObject = (object) ['existingAttribute' => true];
        expect($testObject)->baseObjectToHaveAttribute('existingAttribute');
        expect($testObject)->baseObjectNotToHaveAttribute('fakeproperty');
    }

    public function testHasStaticAttribute(): void
    {
        expect(FakeClassForExpectTest::class)->classToHaveStaticAttribute('staticProperty');
        expect(FakeClassForExpectTest::class)->classNotToHaveStaticAttribute('fakeProperty');
    }

    public function testIsArray(): void
    {
        expect([1, 2, 3])->toBeArray();
        expect(false)->notToBeArray();
    }

    public function testIsBool(): void
    {
        expect(false)->toBeBool();
        expect([1, 2, 3])->notToBeBool();
    }

    public function testIsCallable(): void
    {
        expect(function (): void {
        })->toBeCallable();
        expect(false)->notToBeCallable();
    }

    public function testIsFloat(): void
    {
        expect(1.5)->toBeFloat();
        expect(1)->notToBeFloat();
    }

    public function testIsInstanceOf(): void
    {
        $testClass = new \DateTime();
        expect($testClass)->toBeInstanceOf('DateTime');
        expect($testClass)->notToBeInstanceOf('DateTimeZone');
    }

    public function testIsInt(): void
    {
        expect(5)->toBeInt();
        expect(1.5)->notToBeInt();
    }

    public function testIsNumeric(): void
    {
        expect('1.5')->toBeNumeric();
        expect('foo bar')->notToBeNumeric();
    }

    public function testIsObject(): void
    {
        expect(new \stdClass)->toBeObject();
        expect(false)->notToBeObject();
    }

    public function testIsResource(): void
    {
        expect(fopen(__FILE__, 'r'))->toBeResource();
        expect(false)->notToBeResource();
    }

    public function testIsScalar(): void
    {
        expect('foo bar')->toBeScalar();
        expect([1, 2, 3])->notToBeScalar();
    }

    public function testIsString(): void
    {
        expect('foo bar')->toBeString();
        expect(false)->notToBeString();
    }

    public function testMatchesFormat(): void
    {
        expect('somestring')->stringToMatchFormat('%s');
        expect('somestring')->stringNotToMatchFormat('%i');
    }

    public function testMatchesFormatFile(): void
    {
        expect('23')->stringToMatchFormatFile(__DIR__.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'format-file.txt');
        expect('asdfas')->stringNotToMatchFormatFile(__DIR__.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'format-file.txt');
    }

    public function testNotToEqual(): void
    {
        expect(3)->notToEqual(5);
        expect(3.252)->notToEqualWithDelta(3.25, 0.001);
        expect(3.252)->notToEqualWithDelta(3.25, 0.001, 'respects delta');
        expect(__FILE__)->fileToNotEqual(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'composer.json');
    }

    public function testnotToEqualCanonicalizing(): void
    {
        expect([3, 2, 1])->notToEqualCanonicalizing([2, 3, 0, 1]);
    }

    public function testNotToEqualIgnoringCase(): void
    {
        expect('foo')->notToEqualIgnoringCase('BAR');
    }

    public function testNotToEqualWithDelta(): void
    {
        expect(1.2)->notToEqualWithDelta(1.0, 0.1);
    }

    public function testRegExp(): void
    {
        expect('somestring')->stringToMatchRegExp('/string/');
    }

    public function testSame(): void
    {
        expect(1)->toBe(0 + 1);
        expect(1)->notToBe(true);
    }

    public function testStartsWith(): void
    {
        expect('A completely not funny string')->stringToStartWith('A completely');
        expect('A completely not funny string')->stringNotToStartWith('string');
    }

    public function testStringContainsString(): void
    {
        expect('foo bar')->stringToContainString('o b');
        expect('foo bar')->stringNotToContainString('BAR');
    }

    public function testStringToContainStringIgnoringCase(): void
    {
        expect('foo bar')->stringToContainStringIgnoringCase('O b');
        expect('foo bar')->stringNotToContainStringIgnoringCase('baz');
    }

    public function testThrows(): void
    {
        $func = function (): void {
            throw new Exception('foo');
        };

        expect($func)->callableToThrow();
        expect($func)->callableToThrow(Exception::class);
        expect($func)->callableToThrow(Exception::class, 'foo');
        expect($func)->callableToThrow(new Exception());
        expect($func)->callableToThrow(new Exception('foo'));

        expect(function () use ($func): void {
            expect($func)->callableToThrow(\RuntimeException::class);
        })->callableToThrow(ExpectationFailedException::class);

        expect(function (): void {
            expect(function (): void {
            })->callableToThrow(Exception::class);
        })->callableToThrow(new ExpectationFailedException("exception 'Exception' was not thrown as expected"));
    }

    public function testTrueFalseNull(): void
    {
        expect(true)->toBeTrue();
        expect(false)->toBeFalse();
        expect(null)->toBeNull();
        expect(true)->notToBeNull();
        expect(false)->toBeFalse('something should be false');
        expect(true)->toBeTrue('something should be true');
    }
}

class FakeClassForExpectTest
{
    public static $staticProperty;
}
