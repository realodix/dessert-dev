<?php

namespace Realodix\NextProject\Traits;

use PHPUnit\Framework\Assert as PHPUnit;
use PHPUnit\Runner\Version as PHPUnitVersion;

trait AssertFileDirectoryTrait
{
    public function directoryDoesNotExist(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertDirectoryNotExists($this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertDirectoryDoesNotExist($this->actual, $message);

        return $this;
    }

    public function directoryExists(string $message = ''): self
    {
        PHPUnit::assertDirectoryExists($this->actual, $message);

        return $this;
    }

    public function directoryIsNotReadable(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertDirectoryNotIsReadable($this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertDirectoryIsNotReadable($this->actual, $message);

        return $this;
    }

    public function directoryIsNotWritable(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertDirectoryNotIsWritable($this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertDirectoryIsNotWritable($this->actual, $message);

        return $this;
    }

    public function directoryIsReadable(string $message = ''): self
    {
        PHPUnit::assertDirectoryIsReadable($this->actual, $message);

        return $this;
    }

    public function directoryIsWritable(string $message = ''): self
    {
        PHPUnit::assertDirectoryIsWritable($this->actual, $message);

        return $this;
    }

    public function fileDoesNotExist(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertFileNotExists($this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertFileDoesNotExist($this->actual, $message);

        return $this;
    }

    public function fileEquals($expected, string $message = ''): self
    {
        PHPUnit::assertFileEquals($expected, $this->actual, $message);

        return $this;
    }

    public function fileEqualsCanonicalizing($expected, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '8.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertFileEquals($expected, $this->actual, $message, true);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertFileEqualsCanonicalizing($expected, $this->actual, $message);

        return $this;
    }

    public function fileEqualsIgnoringCase($expected, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '8.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertFileEquals($expected, $this->actual, $message, false, true);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertFileEqualsIgnoringCase($expected, $this->actual, $message);

        return $this;
    }

    public function fileExists(string $message = ''): self
    {
        PHPUnit::assertFileExists($this->actual, $message);

        return $this;
    }

    public function fileIsNotReadable(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertFileNotIsReadable($this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertFileIsNotReadable($this->actual, $message);

        return $this;
    }

    public function fileIsNotWritable(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertFileNotIsWritable($this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertFileIsNotWritable($this->actual, $message);

        return $this;
    }

    public function fileIsReadable(string $message = ''): self
    {
        PHPUnit::assertFileIsReadable($this->actual, $message);

        return $this;
    }

    public function fileIsWritable(string $message = ''): self
    {
        PHPUnit::assertFileIsWritable($this->actual, $message);

        return $this;
    }

    public function fileNotEquals($expected, string $message = ''): self
    {
        PHPUnit::assertFileNotEquals($expected, $this->actual, $message);

        return $this;
    }

    public function fileNotEqualsCanonicalizing($expected, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '8.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertFileNotEquals($expected, $this->actual, $message, true);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertFileNotEqualsCanonicalizing($expected, $this->actual, $message);

        return $this;
    }

    public function fileNotEqualsIgnoringCase($expected, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '8.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertFileNotEquals($expected, $this->actual, $message, false, true);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertFileNotEqualsIgnoringCase($expected, $this->actual, $message);

        return $this;
    }

    public function isNotReadable(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotIsReadable($this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsNotReadable($this->actual, $message);

        return $this;
    }

    public function isNotWritable(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotIsWritable($this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsNotWritable($this->actual, $message);

        return $this;
    }

    public function isReadable(string $message = ''): self
    {
        PHPUnit::assertIsReadable($this->actual, $message);

        return $this;
    }

    public function isWritable(string $message = ''): self
    {
        PHPUnit::assertIsWritable($this->actual, $message);

        return $this;
    }
}
