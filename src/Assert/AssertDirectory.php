<?php

namespace Realodix\NextProject\Assert;

use PHPUnit\Framework\Assert as PHPUnit;
use Realodix\NextProject\Assert;
use Realodix\NextProject\Trait\AssertDataTrait;

class AssertDirectory extends Assert
{
    use AssertDataTrait;

    /**
     * @param string $directory
     */
    public function __construct(string $directory)
    {
        parent::__construct($directory);
    }

    /**
     * Verifies that a directory does not exist.
     *
     * @param string $message
     *
     * @return self
     */
    public function doesNotExist(string $message = ''): self
    {
        PHPUnit::assertDirectoryDoesNotExist($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a directory exists.
     *
     * @param string $message
     *
     * @return self
     */
    public function exists(string $message = ''): self
    {
        PHPUnit::assertDirectoryExists($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a directory exists and is not readable.
     *
     * @param string $message
     *
     * @return self
     */
    public function existsAndIsNotReadable(string $message = ''): self
    {
        PHPUnit::assertDirectoryIsNotReadable($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a directory exists and is not writable.
     *
     * @param string $message
     *
     * @return self
     */
    public function existsAndIsNotWritable(string $message = ''): self
    {
        PHPUnit::assertDirectoryIsNotWritable($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a directory exists and is readable.
     *
     * @param string $message
     *
     * @return self
     */
    public function existsAndIsReadable(string $message = ''): self
    {
        PHPUnit::assertDirectoryIsReadable($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a directory exists and is writable.
     *
     * @param string $message
     *
     * @return self
     */
    public function existsAndIsWritable(string $message = ''): self
    {
        PHPUnit::assertDirectoryIsWritable($this->actual, $message);

        return $this;
    }
}
