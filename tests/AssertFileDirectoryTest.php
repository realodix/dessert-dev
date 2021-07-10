<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\TestCase;

// Coba dibuat, ditemukan pada test Dir
// $this->expectException(AssertionFailedError::class);

final class AssertFileDirectoryTest extends TestCase
{
    protected function setUp(): void
    {
        $this->assetsDir = __DIR__.DIRECTORY_SEPARATOR.'_files'.DIRECTORY_SEPARATOR;
    }

    public function testAssertFileEqualsIgnoringCase()
    {
        $expected = $this->assetsDir.'StringEqualsFile.txt';
        $input = $this->assetsDir.'StringEqualsFile-CI.txt';

        ass($expected)->fileEqualsIgnoringCase($input);
    }

    public function testDirectory(): void
    {
        ass(__DIR__)->directoryIsReadable();
        $this->expectException(AssertionFailedError::class);
        ass(__DIR__.DIRECTORY_SEPARATOR.'NotExisting')->directoryIsReadable();
    }

    public function testFileEquals(): void
    {
        ass(__FILE__)->fileEquals(__FILE__);
        ass(__FILE__)->fileNotEquals(
            __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'composer.json'
        );
    }

    public function testFileEqualsCanonicalizing()
    {
        $file = $this->assetsDir.'StringEqualsFile.txt';

        ass($file)->fileEqualsCanonicalizing($file);
    }

    public function testFileExists(): void
    {
        ass(__FILE__)->fileExists();
        ass('completelyrandomfilename.txt')->fileDoesNotExist();
    }

    public function testFileIsNotReadable()
    {
        if (\DIRECTORY_SEPARATOR === '\\') {
            // The actual behaviour of the assertion cannot be tested on Windows.
            ass([$this, 'assertFileIsNotReadable'])
                ->isCallable('Assertion "assertFileIsNotReadable()" is not callable');

            return;
        }

        $tempFile = \tempnam(\sys_get_temp_dir(), 'unreadable');
        \chmod($tempFile, \octdec('0'));

        ass($tempFile)->fileIsNotReadable();

        \chmod($tempFile, \octdec('755'));
        \unlink($tempFile);
    }

    public function testfileIsNotWritable()
    {
        $tempFile = \tempnam(\sys_get_temp_dir(), 'not_writable');
        \chmod($tempFile, \octdec('0'));

        ass($tempFile)->fileIsNotWritable($tempFile);

        \chmod($tempFile, \octdec('755'));
        \unlink($tempFile);
    }

    public function testfileIsReadable()
    {
        $file = $this->assetsDir.'StringEqualsFile.txt';
        ass($file)->fileIsReadable();
    }

    public function testfileIsWritable()
    {
        $file = $this->assetsDir.'StringEqualsFile.txt';
        ass($file)->fileIsWritable();
    }

    public function testFileNotEqualsCanonicalizing()
    {
        $expected = $this->assetsDir.'StringEqualsFile.txt';
        $input = $this->assetsDir.'StringNotEqualsFile.txt';

        ass($input)->fileNotEqualsCanonicalizing($expected);
    }

    public function testFileNotEqualsIgnoringCase()
    {
        $expected = $this->assetsDir.'StringEqualsFile.txt';
        $input = $this->assetsDir.'StringNotEqualsFile-CI.txt';

        ass($input)->fileNotEqualsIgnoringCase($expected);
    }

    public function testIsReadable(): void
    {
        ass($this->assetsDir.'StringEqualsFile.txt')->isReadable();

        $path = __DIR__.\DIRECTORY_SEPARATOR.'NotExisting.php';
        ass($path)->isNotReadable();
    }

    public function testIsWritable(): void
    {
        $path = $this->assetsDir.'StringEqualsFile.txt';
        ass($path)->isWritable();

        $path = __DIR__.\DIRECTORY_SEPARATOR.'NotExisting'.\DIRECTORY_SEPARATOR;
        ass($path)->isNotWritable();
    }
}
