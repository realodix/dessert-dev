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

    public function testFileExists(): void
    {
        ass(__FILE__)->fileExists();
        ass('completelyrandomfilename.txt')->fileDoesNotExist();
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
