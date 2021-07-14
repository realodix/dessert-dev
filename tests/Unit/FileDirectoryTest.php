<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;

// Coba dibuat, ditemukan pada test Dir
// $this->expectException(AssertionFailedError::class);

final class FileDirectoryTest extends TestCase
{
    public function testDirectoryExists(): void
    {
        ass(__DIR__)->dirExists();
    }

    public function testDirectoryIsNotReadable(): void
    {
        if (PHP_OS_FAMILY === 'Windows') {
            $this->markTestSkipped('Cannot test this behaviour on Windows');
        }

        $dirName = sys_get_temp_dir().DIRECTORY_SEPARATOR.uniqid('unreadable_dir_', true);
        mkdir($dirName, octdec('0'));

        ass($dirName)->dirIsNotReadable();

        rmdir($dirName);
    }

    public function testDirectoryIsNotWritable(): void
    {
        if (PHP_OS_FAMILY === 'Windows') {
            $this->markTestSkipped('Cannot test this behaviour on Windows');
        }

        $dirName = sys_get_temp_dir().DIRECTORY_SEPARATOR.uniqid('not_writable_dir_', true);
        mkdir($dirName, octdec('444'));

        ass($dirName)->dirIsNotWritable();

        rmdir($dirName);
    }

    public function testDirectoryIsReadable(): void
    {
        ass(__DIR__)->dirIsReadable();
    }

    public function testDirectoryIsWritable(): void
    {
        ass(__DIR__)->dirIsWritable();
    }

    public function testDirectoryNotExists(): void
    {
        ass(__DIR__.DIRECTORY_SEPARATOR.'NotExisting')->dirNotExist();
    }

    public function testFileExists(): void
    {
        ass(__FILE__)->fileExists();
        ass('completelyrandomfilename.txt')->fileDoesNotExist();
    }

    public function testFileIsNotReadable()
    {
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

    public function testFileIsNotWritable()
    {
        $tempFile = \tempnam(\sys_get_temp_dir(), 'not_writable');
        \chmod($tempFile, \octdec('0'));

        ass($tempFile)->fileIsNotWritable($tempFile);

        \chmod($tempFile, \octdec('755'));
        \unlink($tempFile);
    }

    public function testFileIsReadable()
    {
        $file = TEST_FILES_PATH.'string_foobar.txt';

        ass($file)->fileIsReadable();
    }

    public function testFileIsWritable()
    {
        $file = TEST_FILES_PATH.'string_foobar.txt';

        ass($file)->fileIsWritable();
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
}
