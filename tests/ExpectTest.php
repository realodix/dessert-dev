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
        expect($errors)->arrayHasNotKey('body');
    }

    public function testContains(): void
    {
        expect([3, 2])->arrayToContain(3);
        expect([3, 2])->arrayNotContains(5, 'user have 5 posts');
    }

    public function testContainsOnly(): void
    {
        expect(['1', '2', '3'])->arrayToContainOnly('string');
        expect(['1', '2', 3])->arrayNotContainsOnly('string');
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
        expect([1, 2, 3])->arrayCount(3);
        expect([1, 2, 3])->arrayNotCount(2);
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
        expect(['3', '5'])->notEmpty();
        expect([])->empty();
    }

    public function testEndsWith(): void
    {
        expect('A completely not funny string')->stringEndsWith('ny string');
        expect('A completely not funny string')->stringNotEndsWith('A completely');
    }

    public function testtoEqual(): void
    {
        expect(5)->toEqual(5);
        expect('hello')->toEqual('hello');
        expect(5)->toEqual(5, 'user have 5 posts');
        expect(3.251)->toEqualWithDelta(3.25, 0.01);
        expect(3.251)->toEqualWithDelta(3.25, 0.01, 'respects delta');
        expect(__FILE__)->fileToBeEqual(__FILE__);
    }

    public function testtoEqualCanonicalizing(): void
    {
        expect([3, 2, 1])->toEqualCanonicalizing([1, 2, 3]);
    }

    public function testtoEqualFile(): void
    {
        expect('%i')->stringtoEqualFile(__DIR__.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'format-file.txt');
        expect('Another string')->stringNottoEqualFile(__DIR__.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'format-file.txt');
    }

    public function testtoEqualIgnoringCase(): void
    {
        expect('foo')->toEqualIgnoringCase('FOO');
    }

    public function testtoEqualJsonFile(): void
    {
        expect(__DIR__.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'json-test-file.json')
            ->jsonFiletoEqualJsonFile(__DIR__.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'equal-json-test-file.json');
        expect('{"some" : "data"}')->jsonStringtoEqualJsonFile(__DIR__.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'equal-json-test-file.json');
    }

    public function testtoEqualJsonString(): void
    {
        expect('{"some" : "data"}')->jsonStringtoEqualJsonString('{"some" : "data"}');
    }

    public function testtoEqualWithDelta(): void
    {
        expect(1.01)->toEqualWithDelta(1.0, 0.1);
    }

    public function testtoEqualXmlFile(): void
    {
        expect(__DIR__.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'xml-test-file.xml')
            ->xmlFiletoEqualXmlFile(__DIR__.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'xml-test-file.xml');
        expect('<foo><bar>Baz</bar><bar>Baz</bar></foo>')
            ->xmlStringtoEqualXmlFile(__DIR__.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'xml-test-file.xml');
    }

    public function testtoEqualXmlString(): void
    {
        expect('<foo><bar>Baz</bar><bar>Baz</bar></foo>')
            ->xmlStringtoEqualXmlString('<foo><bar>Baz</bar><bar>Baz</bar></foo>');
    }

    public function testFileExists(): void
    {
        expect(__FILE__)->fileToExist();
        expect('completelyrandomfilename.txt')->fileDoesNotExists();
    }

    public function testGreaterLowerThan(): void
    {
        expect(7)->greaterThan(5);
        expect(7)->lessThan(10);
        expect(7)->lessThanOrEqual(7);
        expect(7)->lessThanOrEqual(8);
        expect(7)->greaterThanOrEqual(7);
        expect(7)->greaterThanOrEqual(5);
    }

    public function testHasAttribute(): void
    {
        expect('Exception')->classHasAttribute('message');
        expect('Exception')->classNotHasAttribute('fakeproperty');

        $testObject = (object) ['existingAttribute' => true];
        expect($testObject)->baseObjectHasAttribute('existingAttribute');
        expect($testObject)->baseObjectNotHasAttribute('fakeproperty');
    }

    public function testHasStaticAttribute(): void
    {
        expect(FakeClassForExpectTest::class)->classHasStaticAttribute('staticProperty');
        expect(FakeClassForExpectTest::class)->classNotHasStaticAttribute('fakeProperty');
    }

    public function testIsArray(): void
    {
        expect([1, 2, 3])->isArray();
        expect(false)->isNotArray();
    }

    public function testIsBool(): void
    {
        expect(false)->isBool();
        expect([1, 2, 3])->isNotBool();
    }

    public function testIsCallable(): void
    {
        expect(function (): void {
        })->isCallable();
        expect(false)->isNotCallable();
    }

    public function testIsFloat(): void
    {
        expect(1.5)->isFloat();
        expect(1)->isNotFloat();
    }

    public function testIsInstanceOf(): void
    {
        $testClass = new \DateTime();
        expect($testClass)->instanceOf('DateTime');
        expect($testClass)->notInstanceOf('DateTimeZone');
    }

    public function testIsInt(): void
    {
        expect(5)->isInt();
        expect(1.5)->isNotInt();
    }

    public function testIsNumeric(): void
    {
        expect('1.5')->isNumeric();
        expect('foo bar')->isNotNumeric();
    }

    public function testIsObject(): void
    {
        expect(new \stdClass)->isObject();
        expect(false)->isNotObject();
    }

    public function testIsResource(): void
    {
        expect(fopen(__FILE__, 'r'))->isResource();
        expect(false)->isNotResource();
    }

    public function testIsScalar(): void
    {
        expect('foo bar')->isScalar();
        expect([1, 2, 3])->isNotScalar();
    }

    public function testIsString(): void
    {
        expect('foo bar')->isString();
        expect(false)->isNotString();
    }

    public function testMatchesFormat(): void
    {
        expect('somestring')->stringMatchesFormat('%s');
        expect('somestring')->stringNotMatchesFormat('%i');
    }

    public function testMatchesFormatFile(): void
    {
        expect('23')->stringMatchesFormatFile(__DIR__.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'format-file.txt');
        expect('asdfas')->stringNotMatchesFormatFile(__DIR__.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'format-file.txt');
    }

    public function testNottoEqual(): void
    {
        expect(3)->nottoEqual(5);
        expect(3.252)->nottoEqualWithDelta(3.25, 0.001);
        expect(3.252)->nottoEqualWithDelta(3.25, 0.001, 'respects delta');
        expect(__FILE__)->fileNottoEqual(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'composer.json');
    }

    public function testNottoEqualCanonicalizing(): void
    {
        expect([3, 2, 1])->nottoEqualCanonicalizing([2, 3, 0, 1]);
    }

    public function testNottoEqualIgnoringCase(): void
    {
        expect('foo')->nottoEqualIgnoringCase('BAR');
    }

    public function testNottoEqualWithDelta(): void
    {
        expect(1.2)->nottoEqualWithDelta(1.0, 0.1);
    }

    public function testRegExp(): void
    {
        expect('somestring')->stringMatchesRegExp('/string/');
    }

    public function testSame(): void
    {
        expect(1)->same(0 + 1);
        expect(1)->notSame(true);
    }

    public function testStartsWith(): void
    {
        expect('A completely not funny string')->stringStartsWith('A completely');
        expect('A completely not funny string')->stringStartsNotWith('string');
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
