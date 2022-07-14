<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use Realodix\NextProject\Test\Fixtures\ObjectEquals\ValueObject;

// Coba dibuat, ditemukan pada test Dir
// $this->expectException(AssertionFailedError::class);

final class PHPUnitTest extends TestCase
{
    use PHPUnitTestProvider;

    public function testArrayIsList(): void
    {
        ass([0, 1, 2])->arrayIsList();

        $this->expectException(AssertionFailedError::class);

        ass([0 => 0, 2 => 2, 3 => 3])->arrayIsList();
    }

    public function testArrayIsListWithEmptyArray(): void
    {
        ass([])->arrayIsList();
    }

    public function testArrayIsListFailsWithStringKeys(): void
    {
        $this->expectException(AssertionFailedError::class);

        ass(['string' => 0])->arrayIsList();
    }

    public function testStringContainsString(): void
    {
        ass('foo bar')
            ->stringContainsString('o b')
            ->stringNotContainsString('BAR');
    }

    public function testStringContainsStringIgnoringCase(): void
    {
        ass('foo bar')
            ->stringContainsStringIgnoringCase('O b')
            ->stringNotContainsStringIgnoringCase('baz');
    }

    /**
     * @dataProvider stringContainsStringIgnoringLineEndingsProvider
     */
    public function testStringContainsStringIgnoringLineEndings(string $needle, string $haystack): void
    {
        ass($haystack)
            ->stringContainsStringIgnoringLineEndings($needle);
    }

    public function testNotStringContainsStringIgnoringLineEndings(): void
    {
        $this->expectException(ExpectationFailedException::class);

        ass("\r\nc\r\n")
            ->stringContainsStringIgnoringLineEndings("b\nc");
    }

    /**
     * Iterable contains equal object can be asserted
     */
    public function testContainsEquals(): void
    {
        $a = new \stdClass;
        $a->foo = 'bar';

        $b = new \stdClass;
        $b->foo = 'baz';

        ass([$a])->containsEquals($a);

        try {
            ass([$a])->containsEquals($b);
        } catch (AssertionFailedError $e) {
            return;
        }

        $this->fail();
    }

    /**
     * Iterable not contains equal object can be asserted
     */
    public function testNotContainsEquals(): void
    {
        $a = new \stdClass;
        $a->foo = 'bar';

        $b = new \stdClass;
        $b->foo = 'baz';

        ass([$a])->notContainsEquals($b);

        try {
            ass([$a])->notContainsEquals($a);
        } catch (AssertionFailedError $e) {
            return;
        }

        $this->fail();
    }

    public function testContainsOnly(): void
    {
        ass(['1', '2', '3'])->containsOnly('string');
        ass(['1', '2', 3])->notContainsOnly('string');
    }

    public function testContainsOnlyInstancesOf(): void
    {
        $array = [
            new \DateTimeImmutable,
            new \DateTimeImmutable,
        ];

        ass($array)->containsOnlyInstancesOf(\DateTimeImmutable::class);
    }

    public function testCount(): void
    {
        ass([1, 2, 3])
            ->count(3)
            ->notCount(2);
    }

    public function testDirectoryExists(): void
    {
        ass(__DIR__)
            ->directoryExists();
    }

    public function testDirectoryNotExists(): void
    {
        ass(__DIR__.DIRECTORY_SEPARATOR.'NotExisting')
            ->directoryDoesNotExist();
    }

    public function testDirectoryIsReadable(): void
    {
        ass(__DIR__)
            ->directoryIsReadable();
    }

    public function testDirectoryIsWritable(): void
    {
        ass(__DIR__)
            ->directoryIsWritable();
    }

    public function testEmpty(): void
    {
        ass([])->empty();
        ass(['3', '5'])->notEmpty();
    }

    public function testEquals(): void
    {
        ass('hello')->equals('hello');
        ass(5)
            ->equals(5)
            ->equals(5, 'user have 5 posts');

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

    /**
     * @dataProvider stringEqualIgnoringLineEndingsProvider
     */
    public function testStringEqualIgnoringLineEndings(string $expected, string $actual): void
    {
        ass($actual)
            ->stringEqualIgnoringLineEndings($expected);
    }

    /**
     * @dataProvider stringEqualIgnoringLineEndingsFailProvider
     */
    public function testNotStringEqualIgnoringLineEndings(string $expected, string $actual): void
    {
        $this->expectException(ExpectationFailedException::class);
        ass($actual)
            ->stringEqualIgnoringLineEndings($expected);
    }

    /**
     * Two objects can be asserted to be equal using comparison method.
     */
    public function testObjectEquals(): void
    {
        ass(new ValueObject(1))->objectEquals(new ValueObject(1));

        try {
            ass(new ValueObject(2))->objectEquals(new ValueObject(1));
        } catch (AssertionFailedError $e) {
            return;
        }

        $this->fail();
    }

    public function testEqualsWithDelta(): void
    {
        ass(1.01)->equalsWithDelta(1.0, 0.1);
        ass(3.251)
            ->equalsWithDelta(3.25, 0.01)
            ->equalsWithDelta(3.25, 0.01, 'respects delta');

        ass(1.2)->notEqualsWithDelta(1.0, 0.1);
        ass(3.252)
            ->notEqualsWithDelta(3.25, 0.001)
            ->notEqualsWithDelta(3.25, 0.001, 'respects delta');
    }

    public function testFileEquals(): void
    {
        ass(__FILE__)
            ->fileEquals(__FILE__)
            ->fileNotEquals(
                TEST_FILES_PATH.'string_foobar.txt'
            );
    }

    public function testFileExists(): void
    {
        ass(__FILE__)->fileExists();
        ass('completelyrandomfilename.txt')->fileDoesNotExist();
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

    public function testFileIsReadable()
    {
        ass(TEST_FILES_PATH.'string_foobar.txt')
            ->fileIsReadable();
    }

    public function testFileIsWritable()
    {
        ass(TEST_FILES_PATH.'string_foobar.txt')
            ->fileIsWritable();
    }

    public function testFileIsNotWritable()
    {
        $tempFile = tempnam(sys_get_temp_dir(), 'not_writable');
        chmod($tempFile, octdec('0'));

        ass($tempFile)->fileIsNotWritable($tempFile);

        chmod($tempFile, octdec('755'));
        unlink($tempFile);
    }

    public function testGreaterThan(): void
    {
        ass(7)
            ->greaterThan(5, true)
            ->greaterThanOrEqual(7)
            ->greaterThanOrEqual(5);
    }

    public function testLessThan(): void
    {
        ass(7)
            ->lessThan(10)
            ->lessThanOrEqual(7)
            ->lessThanOrEqual(8);
    }

    public function testInfinite(): void
    {
        ass(INF)->infinite();
    }

    public function testFinite(): void
    {
        ass(1)->finite();
    }

    public function testInstanceOf(): void
    {
        ass(new \DateTime)
            ->instanceOf('DateTime')
            ->notInstanceOf('DateTimeZone');
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
        ass(function (): void {})->isCallable();

        ass(false)->isNotCallable();
    }

    public function testIsClosedResource(): void
    {
        $resource = fopen(__FILE__, 'r');
        fclose($resource);

        ass($resource)->isClosedResource();

        ass(null)->isNotClosedResource();
        ass(['array'])->isNotClosedResource();
        ass(new \stdClass)->isNotClosedResource();

        // isClosedResource() test for code coverage
        ass(\Realodix\NextProject\Support\Validator::isClosedResource($resource))
            ->true();
        ass(\Realodix\NextProject\Support\Validator::isClosedResource(null))
            ->false();
    }

    public function testIsFloat(): void
    {
        ass(1.5)->isFloat();
        ass(1)->isNotFloat();
    }

    public function testIsInt(): void
    {
        ass(5)->isInt();
        ass(1.5)->isNotInt();
    }

    public function testIsIterable(): void
    {
        ass([])->isIterable();
        ass(null)->isNotIterable();
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

    public function testIsReadable(): void
    {
        ass(TEST_FILES_PATH.'string_foobar.txt')->isReadable();

        $path = __DIR__.\DIRECTORY_SEPARATOR.'NotExisting.php';
        ass($path)->isNotReadable();
    }

    public function testIsWritable(): void
    {
        $path = TEST_FILES_PATH.'string_foobar.txt';
        ass($path)->isWritable();

        $path = __DIR__.\DIRECTORY_SEPARATOR.'NotExisting'.\DIRECTORY_SEPARATOR;
        ass($path)->isNotWritable();
    }

    public function testJson(): void
    {
        $json = json_encode(['foo' => 'bar']);

        ass($json)->json();
    }

    public function testJsonFileEqualsJsonFile(): void
    {
        $fileExpected = TEST_FILES_PATH.'json_array_object.json';
        $fileActual = TEST_FILES_PATH.'json_simple_object.json';

        ass($fileActual)
            ->jsonFileEqualsJsonFile($fileActual)
            ->jsonFileNotEqualsJsonFile($fileExpected);
    }

    public function testJsonStringEqualsJsonFile(): void
    {
        $jsonFile = TEST_FILES_PATH.'json_simple_object.json';
        $jsonString = json_encode(['foo' => 'bar']);

        ass($jsonString)
            ->jsonStringEqualsJsonFile($jsonFile);

        ass(json_encode(['foo' => 'baz']))
            ->jsonStringNotEqualsJsonFile($jsonFile);
    }

    public function testJsonStringEqualsJsonString(): void
    {
        $jsonString = json_encode(['foo' => 'bar']);

        ass($jsonString)
            ->jsonStringEqualsJsonString($jsonString)
            ->jsonStringNotEqualsJsonString(json_encode(['foo' => 'baz']));
    }

    public function testNan(): void
    {
        ass(NAN)->nan();
    }

    public function testNull(): void
    {
        ass(null)->null();
        ass(true)->notNull();
    }

    public function testMatchesRegularExpression(): void
    {
        ass('foobar')
            ->matchesRegularExpression('/foobar/')
            ->doesNotMatchRegularExpression('/foobarbaz/');
    }

    public function testStringMatchesFormat(): void
    {
        ass('somestring')
            ->stringMatchesFormat('%s')
            ->stringNotMatchesFormat('%i');
    }

    public function testStringMatchesFormatFile(): void
    {
        $formatFile = TEST_FILES_PATH.'string_foobar.txt';

        ass('foo_bar')->stringMatchesFormatFile($formatFile);
        ass('string_not_matches')->stringNotMatchesFormatFile($formatFile);
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

    public function testStringStartsWith(): void
    {
        ass('foobar')
            ->stringStartsWith('fo')
            ->stringStartsNotWith('ar');
    }

    public function testStringEndsWith(): void
    {
        ass('foobar')
            ->stringEndsWith('ar')
            ->stringEndsNotWith('foo');
    }

    public function testStringEqualsFileCanonicalizing(): void
    {
        $string_foobar = TEST_FILES_PATH.'string_foobar.txt';

        ass('foo_bar')
            ->stringEqualsFileCanonicalizing($string_foobar);
        ass('notSame')
            ->stringNotEqualsFileCanonicalizing($string_foobar);
    }

    public function testStringEqualsFileIgnoringCase(): void
    {
        $string_foobar = TEST_FILES_PATH.'string_foobar.txt';

        ass('FOO_BAR')
            ->stringEqualsFileIgnoringCase($string_foobar);
        ass('Test 123')
            ->stringNotEqualsFileIgnoringCase($string_foobar);
    }

    public function testTrue(): void
    {
        ass(true)->true();
        ass(false)->notTrue();
    }

    public function testFalse(): void
    {
        ass(false)->false();
        ass(true)->notFalse();
    }

    public function testXmlFileEqualsXmlFile(): void
    {
        $actual = TEST_FILES_PATH.'xml_foo.xml';
        $expected = TEST_FILES_PATH.'xml_bar.xml';

        ass($actual)
            ->xmlFileEqualsXmlFile($actual)
            ->xmlFileNotEqualsXmlFile($expected);
    }

    public function testXmlStringEqualsXmlFile(): void
    {
        $xmlFoo = TEST_FILES_PATH.'xml_foo.xml';
        $xmlBar = TEST_FILES_PATH.'xml_bar.xml';

        ass('<foo/>')
            ->xmlStringEqualsXmlFile($xmlFoo)
            ->xmlStringNotEqualsXmlFile($xmlBar);
    }

    public function testXmlStringEqualsXmlString(): void
    {
        ass('<foo/>')
            ->xmlStringEqualsXmlString('<foo/>')
            ->xmlStringNotEqualsXmlString('<bar/>');
    }

    public function testDirectoryIsNotReadable(): void
    {
        // symfony/polyfill-php72
        if (PHP_OS_FAMILY === 'Windows') {
            $this->markTestSkipped('Cannot test this behaviour on Windows');
        }

        $dirName = sys_get_temp_dir().DIRECTORY_SEPARATOR.uniqid('unreadable_dir_', true);
        mkdir($dirName, octdec('0'));

        ass($dirName)
            ->directoryIsNotReadable()
            ->dirIsNotReadable();

        rmdir($dirName);
    }

    public function testDirectoryIsNotWritable(): void
    {
        // symfony/polyfill-php72
        if (PHP_OS_FAMILY === 'Windows') {
            $this->markTestSkipped('Cannot test this behaviour on Windows');
        }

        $dirName = sys_get_temp_dir().DIRECTORY_SEPARATOR.uniqid('not_writable_dir_', true);
        mkdir($dirName, octdec('444'));

        ass($dirName)
            ->directoryIsNotWritable()
            ->dirIsNotWritable();

        rmdir($dirName);
    }

    public function testFileIsNotReadable()
    {
        // symfony/polyfill-php72
        if (PHP_OS_FAMILY === 'Windows') {
            $this->markTestSkipped('Cannot test this behaviour on Windows');
        }

        $tempFile = tempnam(
            sys_get_temp_dir(),
            'unreadable'
        );

        chmod($tempFile, octdec('0'));

        ass($tempFile)->fileIsNotReadable();

        unlink($tempFile);
    }
}
