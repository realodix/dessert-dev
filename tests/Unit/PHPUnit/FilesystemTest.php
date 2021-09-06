<?php

namespace Realodix\NextProject\Test\PHPUnit;

use PHPUnit\Framework\TestCase;

// Coba dibuat, ditemukan pada test Dir
// $this->expectException(AssertionFailedError::class);

final class FilesystemTest extends TestCase
{
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
