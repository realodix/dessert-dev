<?php

namespace Realodix\NextProject\BddStyles;

use PHPUnit\Framework\Assert as PHPUnit;
use PHPUnit\Runner\Version as PHPUnitVersion;
use Realodix\NextProject\Expect;
use Realodix\NextProject\Traits\ExpectDataTrait;

class BddFile extends Expect
{
    use ExpectDataTrait;

    public function __construct(string $actual)
    {
        parent::__construct($actual);
    }

    /**
     * Expect that a file does not exist.
     *
     * @param string $message
     *
     * @return self
     */
    public function notToExist(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            PHPUnit::assertFileNotExists($this->actual, $message);

            return $this;
        }

        PHPUnit::assertFileDoesNotExist($this->actual, $message);

        return $this;
    }

    /**
     * Expect that the contents of one file is equal to the contents of another file.
     *
     * @param string $expected
     * @param string $message
     *
     * @return self
     */
    public function toBeEqual(string $expected, string $message = ''): self
    {
        PHPUnit::assertFileEquals($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that the contents of one file is equal to the contents of another file (canonicalizing).
     *
     * @param string $expected
     * @param string $message
     *
     * @return self
     */
    public function toBeEqualCanonicalizing(string $expected, string $message = ''): self
    {
        PHPUnit::assertFileEqualsCanonicalizing($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that the contents of one file is equal to the contents of another file (ignoring case).
     *
     * @param string $expected
     * @param string $message
     *
     * @return self
     */
    public function toBeEqualIgnoringCase(string $expected, string $message = ''): self
    {
        PHPUnit::assertFileEqualsIgnoringCase($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that a file exists.
     *
     * @param string $message
     *
     * @return self
     */
    public function toExist(string $message = ''): self
    {
        PHPUnit::assertFileExists($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a file exists and is not readable.
     *
     * @param string $message
     *
     * @return self
     */
    public function toExistAndNotToBeReadable(string $message = ''): self
    {
        PHPUnit::assertFileIsNotReadable($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a file exists and is not writable.
     *
     * @param string $message
     *
     * @return self
     */
    public function toExistAndNotToBeWritable(string $message = ''): self
    {
        PHPUnit::assertFileIsNotWritable($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a file exists and is readable.
     *
     * @param string $message
     *
     * @return self
     */
    public function toExistAndToBeReadable(string $message = ''): self
    {
        PHPUnit::assertFileIsReadable($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a file exists and is writable.
     *
     * @param string $message
     *
     * @return self
     */
    public function toExistAndToBeWritable(string $message = ''): self
    {
        PHPUnit::assertFileIsWritable($this->actual, $message);

        return $this;
    }

    /**
     * Expect that the contents of one file is not equal to the contents of another file.
     *
     * @param mixed  $expected
     * @param string $message
     *
     * @return self
     */
    public function toNotEqual(string $expected, string $message = ''): self
    {
        PHPUnit::assertFileNotEquals($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that the contents of one file is not equal to the contents of another file (canonicalizing).
     *
     * @param mixed  $expected
     * @param string $message
     *
     * @return self
     */
    public function toNotEqualCanonicalizing(string $expected, string $message = ''): self
    {
        PHPUnit::assertFileNotEqualsCanonicalizing($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that the contents of one file is not equal to the contents of another file (ignoring case).
     *
     * @param mixed  $expected
     * @param string $message
     *
     * @return self
     */
    public function toNotEqualIgnoringCase(string $expected, string $message = ''): self
    {
        PHPUnit::assertFileNotEqualsIgnoringCase($expected, $this->actual, $message);

        return $this;
    }
}
