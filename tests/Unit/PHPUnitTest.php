<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\TestCase;
use Realodix\NextProject\Test\Fixtures\ObjectEquals\ValueObject;

final class PHPUnitTest extends TestCase
{
    public function testClassHasAttribute(): void
    {
        ass('Exception')
            ->classHasAttribute('message')
            ->classNotHasAttribute('fakeproperty');

        if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
            $testObject = (object) ['existingAttribute' => true];
            ass($testObject)->objectNotHasAttribute('fakeproperty');
            ass($testObject)->objectHasAttribute('existingAttribute');
        }
    }

    public function testClassHasStaticAttribute(): void
    {
        ass(FakeClassForTesting::class)
            ->classHasStaticAttribute('staticProperty')
            ->classNotHasStaticAttribute('fakeProperty');
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

    public function testContainsOnly(): void
    {
        ass(['1', '2', '3'])->containsOnly('string');
        ass(['1', '2', 3])->notContainsOnly('string');
    }

    public function testContainsOnlyInstancesOf(): void
    {
        $array = [
            new FakeClassForTesting(),
            new FakeClassForTesting(),
            new FakeClassForTesting(),
        ];

        ass($array)->containsOnlyInstancesOf(FakeClassForTesting::class);
    }

    public function testCount(): void
    {
        ass([1, 2, 3])
            ->count(3)
            ->notCount(2);
    }

    public function testDirectoryExists(): void
    {
        ass(__DIR__)->dirExists();
    }

    public function testDirectoryNotExists(): void
    {
        ass(__DIR__.DIRECTORY_SEPARATOR.'NotExisting')->dirNotExist();
    }

    public function testDirectoryIsReadable(): void
    {
        ass(__DIR__)->dirIsReadable();
    }

    public function testDirectoryIsNotReadable(): void
    {
        // symfony/polyfill-php72
        if (PHP_OS_FAMILY === 'Windows') {
            $this->markTestSkipped('Cannot test this behaviour on Windows');
        }

        $dirName = sys_get_temp_dir().DIRECTORY_SEPARATOR.uniqid('unreadable_dir_', true);
        mkdir($dirName, octdec('0'));

        ass($dirName)->dirIsNotReadable();

        rmdir($dirName);
    }

    public function testDirectoryIsWritable(): void
    {
        ass(__DIR__)->dirIsWritable();
    }

    public function testDirectoryIsNotWritable(): void
    {
        // symfony/polyfill-php72
        if (PHP_OS_FAMILY === 'Windows') {
            $this->markTestSkipped('Cannot test this behaviour on Windows');
        }

        $dirName = sys_get_temp_dir().DIRECTORY_SEPARATOR.uniqid('not_writable_dir_', true);
        mkdir($dirName, octdec('444'));

        ass($dirName)->dirIsNotWritable();

        rmdir($dirName);
    }

    public function testEmpty(): void
    {
        ass([])->empty();
        ass(['3', '5'])->notEmpty();
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
        ass(3.251)
            ->equalsWithDelta(3.25, 0.01)
            ->equalsWithDelta(3.25, 0.01, 'respects delta');

        ass(1.2)->notEqualsWithDelta(1.0, 0.1);
        ass(3.252)
            ->notEqualsWithDelta(3.25, 0.001)
            ->notEqualsWithDelta(3.25, 0.001, 'respects delta');
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
        $file = TEST_FILES_PATH.'string_foobar.txt';

        ass($file)->fileIsReadable();
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

    public function testFileIsWritable()
    {
        $file = TEST_FILES_PATH.'string_foobar.txt';

        ass($file)->fileIsWritable();
    }

    public function testFileIsNotWritable()
    {
        $tempFile = tempnam(sys_get_temp_dir(), 'not_writable');
        chmod($tempFile, octdec('0'));

        ass($tempFile)->fileIsNotWritable($tempFile);

        chmod($tempFile, octdec('755'));
        unlink($tempFile);
    }

    public function testInstanceOf(): void
    {
        $testClass = new \DateTime();

        ass($testClass)
            ->instanceOf('DateTime')
            ->notInstanceOf('DateTimeZone');
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
}

class FakeClassForTesting
{
    public static $staticProperty;
}
