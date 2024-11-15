<?php

namespace Realodix\Dessert\Test;

use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use Realodix\Dessert\Test\Fixtures\ObjectEquals\ValueObject;

// Coba dibuat, ditemukan pada test Dir
// $this->expectException(AssertionFailedError::class);

final class PHPUnitTest extends TestCase
{
    public function testArrayHasKey(): void
    {
        verify(['foo'])->arrayHasKey(0);
        verify(['foo' => 'bar'])->arrayHasKey('foo');

        $array = new \ArrayObject;
        $array['foo'] = 'bar';
        verify($array)->arrayHasKey('foo');

        $this->expectException(ExpectationFailedException::class);
        verify($array)->arrayHasKey('bar');
        // $array = new \PHPUnit\TestFixture\SampleArrayAccess;
        // $array['foo'] = 'bar';
        // verify($array)->arrayHasKey('foo');
    }

    public function testArrayNotHasKey(): void
    {
        verify(['foo'])
            ->arrayNotHasKey(1)
            ->not->arrayHasKey(1);
        verify(['foo' => 'bar'])
            ->arrayNotHasKey('bar')
            ->not->arrayHasKey('bar');

        $array = new \ArrayObject;
        $array['foo'] = 'bar';
        verify($array)->arrayNotHasKey('bar');

        $this->expectException(ExpectationFailedException::class);
        verify($array)->arrayNotHasKey('foo');
    }

    public function testIsList(): void
    {
        verify([0, 1, 2])->isList();

        $this->expectException(AssertionFailedError::class);

        verify([0 => 0, 2 => 2, 3 => 3])->isList();
    }

    public function testIsListWithEmptyArray(): void
    {
        verify([])->isList();
    }

    public function testIsListFailsWithStringKeys(): void
    {
        $this->expectException(AssertionFailedError::class);

        verify(['string' => 0])->isList();
    }

    public function testStringContainsString(): void
    {
        verify('foo bar')
            ->stringContainsString('o b')
            ->stringNotContainsString('BAR');
    }

    public function testStringContainsStringIgnoringCase(): void
    {
        verify('foo bar')
            ->stringContainsStringIgnoringCase('O b')
            ->stringNotContainsStringIgnoringCase('baz');
    }

    public function testStringContainsStringIgnoringLineEndings(): void
    {
        verify("b\r\nc")
            ->stringContainsStringIgnoringLineEndings("b\nc");
    }

    public function testNotStringContainsStringIgnoringLineEndings(): void
    {
        $this->expectException(ExpectationFailedException::class);

        verify("\r\nc\r\n")
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

        verify([$a])->containsEquals($a);

        try {
            verify([$a])->containsEquals($b);
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

        verify([$a])->notContainsEquals($b);

        try {
            verify([$a])->notContainsEquals($a);
        } catch (AssertionFailedError $e) {
            return;
        }

        $this->fail();
    }

    public function testContainsOnly(): void
    {
        verify(['1', '2', '3'])->containsOnly('string');
        verify(['1', '2', 3])->notContainsOnly('string');
    }

    public function testContainsOnlyInstancesOf(): void
    {
        $array = [
            new \DateTimeImmutable,
            new \DateTimeImmutable,
        ];

        verify($array)->containsOnlyInstancesOf(\DateTimeImmutable::class);
    }

    public function testCount(): void
    {
        verify([1, 2, 3])
            ->count(3)
            ->notCount(2);
    }

    public function testDirectoryExists(): void
    {
        verify(__DIR__)
            ->directoryExists();
    }

    public function testDirectoryNotExists(): void
    {
        verify(__DIR__ . DIRECTORY_SEPARATOR . 'NotExisting')
            ->directoryDoesNotExist();
    }

    public function testDirectoryIsReadable(): void
    {
        verify(__DIR__)
            ->directoryIsReadable();
    }

    public function testDirectoryIsWritable(): void
    {
        verify(__DIR__)
            ->directoryIsWritable();
    }

    public function testEmpty(): void
    {
        verify([])->empty();
        verify(['3', '5'])->notEmpty();
    }

    public function testEquals(): void
    {
        verify('hello')->equals('hello');
        verify(5)
            ->equals(5)
            ->equals(5, 'user have 5 posts');

        verify(3)->notEquals(5);
    }

    public function testEqualsCanonicalizing(): void
    {
        verify([3, 2, 1])
            ->equalsCanonicalizing([1, 2, 3])
            ->notEqualsCanonicalizing([2, 3, 0, 1]);
    }

    public function testEqualsIgnoringCase(): void
    {
        verify('foo')
            ->equalsIgnoringCase('FOO')
            ->notEqualsIgnoringCase('BAR');
    }

    public function testStringEqualIgnoringLineEndings(): void
    {
        verify("a\r\nb")
            ->stringEqualIgnoringLineEndings("a\nb");
    }

    public function testNotStringEqualIgnoringLineEndings(): void
    {
        $this->expectException(ExpectationFailedException::class);
        verify('ab')
            ->stringEqualIgnoringLineEndings("a\nb");
    }

    /**
     * Two objects can be asserted to be equal using comparison method.
     */
    public function testObjectEquals(): void
    {
        verify(new ValueObject(1))->objectEquals(new ValueObject(1));

        try {
            verify(new ValueObject(2))->objectEquals(new ValueObject(1));
        } catch (AssertionFailedError $e) {
            return;
        }

        $this->fail();
    }

    public function testObjectNotEquals(): void
    {
        verify(new ValueObject(1))->objectNotEquals(new ValueObject(2));

        try {
            verify(new ValueObject(1))->objectNotEquals(new ValueObject(1));
        } catch (AssertionFailedError $e) {
            return;
        }

        $this->fail();
    }

    public function testEqualsWithDelta(): void
    {
        verify(1.01)->equalsWithDelta(1.0, 0.1);
        verify(3.251)
            ->equalsWithDelta(3.25, 0.01)
            ->equalsWithDelta(3.25, 0.01, 'respects delta');

        verify(1.2)->notEqualsWithDelta(1.0, 0.1);
        verify(3.252)
            ->notEqualsWithDelta(3.25, 0.001)
            ->notEqualsWithDelta(3.25, 0.001, 'respects delta');
    }

    public function testFileEquals(): void
    {
        verify(__FILE__)
            ->fileEquals(__FILE__)
            ->fileNotEquals(
                TEST_FILES_PATH . 'string_foobar.txt',
            );
    }

    public function testFileExists(): void
    {
        verify(__FILE__)->fileExists();
        verify('completelyrandomfilename.txt')->fileDoesNotExist();
    }

    public function testFileEqualsCanonicalizing()
    {
        $actual = TEST_FILES_PATH . 'string_foobar.txt';
        $expected = TEST_FILES_PATH . 'string_foobar_upper.txt';

        verify($actual)
            ->fileEqualsCanonicalizing($actual)
            ->fileNotEqualsCanonicalizing($expected);
    }

    public function testFileEqualsIgnoringCase()
    {
        $file1 = TEST_FILES_PATH . 'string_foobar.txt';
        $file2 = TEST_FILES_PATH . 'string_foobar_upper.txt';
        $file3 = TEST_FILES_PATH . 'string_foobaz.txt';

        verify($file1)->fileEqualsIgnoringCase($file2);
        verify($file3)->fileNotEqualsIgnoringCase($file1);
    }

    public function testFileIsReadable()
    {
        verify(TEST_FILES_PATH . 'string_foobar.txt')
            ->fileIsReadable();
    }

    public function testFileIsWritable()
    {
        verify(TEST_FILES_PATH . 'string_foobar.txt')
            ->fileIsWritable();
    }

    public function testFileIsNotWritable()
    {
        $tempFile = tempnam(sys_get_temp_dir(), 'not_writable');
        chmod($tempFile, octdec('0'));

        verify($tempFile)->fileIsNotWritable($tempFile);

        chmod($tempFile, octdec('755'));
        unlink($tempFile);
    }

    public function testGreaterThan(): void
    {
        verify(7)
            ->greaterThan(5, true)
            ->greaterThanOrEqual(7)
            ->greaterThanOrEqual(5);
    }

    public function testLessThan(): void
    {
        verify(7)
            ->lessThan(10)
            ->lessThanOrEqual(7)
            ->lessThanOrEqual(8);
    }

    public function testInfinite(): void
    {
        verify(INF)->infinite();
    }

    public function testFinite(): void
    {
        verify(1)->finite();
    }

    public function testInstanceOf(): void
    {
        verify(new \DateTime)
            ->instanceOf('DateTime')
            ->notInstanceOf('DateTimeZone');
    }

    public function testIsArray(): void
    {
        verify([1, 2, 3])->isArray();
        verify(false)->isNotArray();
    }

    public function testIsBool(): void
    {
        verify(false)->isBool();
        verify([1, 2, 3])->isNotBool();
    }

    public function testIsCallable(): void
    {
        verify(function (): void {})->isCallable();

        verify(false)->isNotCallable();
    }

    public function testIsClosedResource(): void
    {
        $resource = fopen(__FILE__, 'r');
        fclose($resource);

        verify($resource)->isClosedResource();

        verify(null)->isNotClosedResource();
        verify(['array'])->isNotClosedResource();
        verify(new \stdClass)->isNotClosedResource();
    }

    public function testIsFloat(): void
    {
        verify(1.5)->isFloat();
        verify(1)->isNotFloat();
    }

    public function testIsInt(): void
    {
        verify(5)->isInt();
        verify(1.5)->isNotInt();
    }

    public function testIsIterable(): void
    {
        verify([])->isIterable();
        verify(null)->isNotIterable();
    }

    public function testIsNumeric(): void
    {
        verify('1.5')->isNumeric();
        verify('foo bar')->isNotNumeric();
    }

    public function testIsObject(): void
    {
        verify(new \stdClass)->isObject();
        verify(false)->isNotObject();
    }

    public function testIsResource(): void
    {
        verify(fopen(__FILE__, 'r'))->isResource();
        verify(false)->isNotResource();
    }

    public function testIsScalar(): void
    {
        verify('foo bar')->isScalar();
        verify([1, 2, 3])->isNotScalar();
    }

    public function testIsString(): void
    {
        verify('foo bar')->isString();
        verify(false)->isNotString();
    }

    public function testIsReadable(): void
    {
        verify(TEST_FILES_PATH . 'string_foobar.txt')->isReadable();

        $path = __DIR__ . \DIRECTORY_SEPARATOR . 'NotExisting.php';
        verify($path)->isNotReadable();
    }

    public function testIsWritable(): void
    {
        $path = TEST_FILES_PATH . 'string_foobar.txt';
        verify($path)->isWritable();

        $path = __DIR__ . \DIRECTORY_SEPARATOR . 'NotExisting' . \DIRECTORY_SEPARATOR;
        verify($path)->isNotWritable();
    }

    public function testJson(): void
    {
        $json = json_encode(['foo' => 'bar']);

        verify($json)->json();
    }

    public function testJsonFileEqualsJsonFile(): void
    {
        $fileExpected = TEST_FILES_PATH . 'json_array_object.json';
        $fileActual = TEST_FILES_PATH . 'json_simple_object.json';

        verify($fileActual)
            ->jsonFileEqualsJsonFile($fileActual)
            ->jsonFileNotEqualsJsonFile($fileExpected);
    }

    public function testJsonStringEqualsJsonFile(): void
    {
        $jsonFile = TEST_FILES_PATH . 'json_simple_object.json';
        $jsonString = json_encode(['foo' => 'bar']);

        verify($jsonString)
            ->jsonStringEqualsJsonFile($jsonFile);

        verify(json_encode(['foo' => 'baz']))
            ->jsonStringNotEqualsJsonFile($jsonFile);
    }

    public function testJsonStringEqualsJsonString(): void
    {
        $jsonString = json_encode(['foo' => 'bar']);

        verify($jsonString)
            ->jsonStringEqualsJsonString($jsonString)
            ->jsonStringNotEqualsJsonString(json_encode(['foo' => 'baz']));
    }

    public function testNan(): void
    {
        verify(NAN)->nan();
    }

    public function testNull(): void
    {
        verify(null)->null();
        verify(true)->notNull();
    }

    public function testMatchesRegularExpression(): void
    {
        verify('foobar')
            ->matchesRegularExpression('/foobar/')
            ->doesNotMatchRegularExpression('/foobarbaz/');
    }

    public function testSame(): void
    {
        verify(1)->same(0 + 1)
              ->notSame(true);
    }

    public function testSameSize(): void
    {
        verify([1, 2])
            ->sameSize([1, 2])
            ->notSameSize([1, 2, 3]);
    }

    public function testStringStartsWith(): void
    {
        verify('foobar')
            ->stringStartsWith('fo')
            ->stringStartsNotWith('ar');
    }

    public function testStringEndsWith(): void
    {
        verify('foobar')
            ->stringEndsWith('ar')
            ->stringEndsNotWith('foo');
    }

    public function testStringEqualsFileCanonicalizing(): void
    {
        $string_foobar = TEST_FILES_PATH . 'string_foobar.txt';

        verify('foo_bar')
            ->stringEqualsFileCanonicalizing($string_foobar);
        verify('notSame')
            ->stringNotEqualsFileCanonicalizing($string_foobar);
    }

    public function testStringEqualsFileIgnoringCase(): void
    {
        $string_foobar = TEST_FILES_PATH . 'string_foobar.txt';

        verify('FOO_BAR')
            ->stringEqualsFileIgnoringCase($string_foobar);
        verify('Test 123')
            ->stringNotEqualsFileIgnoringCase($string_foobar);
    }

    public function testTrue(): void
    {
        verify(true)->true();
        verify(false)->notTrue();
    }

    public function testFalse(): void
    {
        verify(false)->false();
        verify(true)->notFalse();
    }

    public function testXmlFileEqualsXmlFile(): void
    {
        $actual = TEST_FILES_PATH . 'xml_foo.xml';
        $expected = TEST_FILES_PATH . 'xml_bar.xml';

        verify($actual)
            ->xmlFileEqualsXmlFile($actual)
            ->xmlFileNotEqualsXmlFile($expected);
    }

    public function testXmlStringEqualsXmlFile(): void
    {
        $xmlFoo = TEST_FILES_PATH . 'xml_foo.xml';
        $xmlBar = TEST_FILES_PATH . 'xml_bar.xml';

        verify('<foo/>')
            ->xmlStringEqualsXmlFile($xmlFoo)
            ->xmlStringNotEqualsXmlFile($xmlBar);
    }

    public function testXmlStringEqualsXmlString(): void
    {
        verify('<foo/>')
            ->xmlStringEqualsXmlString('<foo/>')
            ->xmlStringNotEqualsXmlString('<bar/>');
    }

    public function testDirectoryIsNotReadable(): void
    {
        if (PHP_OS_FAMILY === 'Windows') {
            $this->markTestSkipped('Cannot test this behaviour on Windows');
        }

        $dirName = sys_get_temp_dir() . DIRECTORY_SEPARATOR . uniqid('unreadable_dir_', true);
        mkdir($dirName, octdec('0'));

        verify($dirName)
            ->directoryIsNotReadable();

        rmdir($dirName);
    }

    public function testDirectoryIsNotWritable(): void
    {
        if (PHP_OS_FAMILY === 'Windows') {
            $this->markTestSkipped('Cannot test this behaviour on Windows');
        }

        $dirName = sys_get_temp_dir() . DIRECTORY_SEPARATOR . uniqid('not_writable_dir_', true);
        mkdir($dirName, octdec('444'));

        verify($dirName)
            ->directoryIsNotWritable();

        rmdir($dirName);
    }

    public function testFileIsNotReadable()
    {
        if (PHP_OS_FAMILY === 'Windows') {
            $this->markTestSkipped('Cannot test this behaviour on Windows');
        }

        $tempFile = tempnam(
            sys_get_temp_dir(),
            'unreadable',
        );

        chmod($tempFile, octdec('0'));

        verify($tempFile)->fileIsNotReadable();

        unlink($tempFile);
    }
}
