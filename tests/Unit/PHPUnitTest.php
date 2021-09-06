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
