<?php

namespace Realodix\NextProject\Test\PHPUnit;

use PHPUnit\Framework\TestCase;

// Coba dibuat, ditemukan pada test Dir
// $this->expectException(AssertionFailedError::class);

final class FilesystemTest extends TestCase
{
    public function testFileExists(): void
    {
        ass(__FILE__)->fileExists();
        ass('completelyrandomfilename.txt')->fileDoesNotExist();
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

    public function testFileIsNotWritable()
    {
        $tempFile = tempnam(sys_get_temp_dir(), 'not_writable');
        chmod($tempFile, octdec('0'));

        ass($tempFile)->fileIsNotWritable($tempFile);

        chmod($tempFile, octdec('755'));
        unlink($tempFile);
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
