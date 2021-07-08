<?php

namespace Realodix\NextProject\Expectations;

use PHPUnit\Framework\Assert as PHPUnit;
use Realodix\NextProject\Expect;

class ExpectDirectory extends Expect
{
    use ExpectDataTrait;

    /**
     * @param string $directory
     */
    public function __construct(string $directory)
    {
        parent::__construct($directory);
    }

    /**
     * Expect that a directory does not exist.
     *
     * @param string $message
     *
     * @return self
     */
    public function notToExist(string $message = ''): self
    {
        PHPUnit::assertDirectoryDoesNotExist($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a directory exists.
     *
     * @param string $message
     *
     * @return self
     */
    public function toExist(string $message = ''): self
    {
        PHPUnit::assertDirectoryExists($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a directory exists and is not readable.
     *
     * @param string $message
     *
     * @return self
     */
    public function toExistAndNotToBeReadable(string $message = ''): self
    {
        PHPUnit::assertDirectoryIsNotReadable($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a directory exists and is not writable.
     *
     * @param string $message
     *
     * @return self
     */
    public function toExistAndNotToBeWritable(string $message = ''): self
    {
        PHPUnit::assertDirectoryIsNotWritable($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a directory exists and is readable.
     *
     * @param string $message
     *
     * @return self
     */
    public function toExistAndToBeReadable(string $message = ''): self
    {
        PHPUnit::assertDirectoryIsReadable($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a directory exists and is writable.
     *
     * @param string $message
     *
     * @return self
     */
    public function toExistAndToBeWritable(string $message = ''): self
    {
        PHPUnit::assertDirectoryIsWritable($this->actual, $message);

        return $this;
    }
}
