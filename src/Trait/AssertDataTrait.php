<?php

namespace Realodix\NextProject\Trait;

use PHPUnit\Framework\Assert as PHPUnit;

trait AssertDataTrait
{
    /**
     * Verifies that a file/dir is not readable.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotReadable(string $message = ''): self
    {
        PHPUnit::assertIsNotReadable($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a file/dir is not writable.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotWritable(string $message = ''): self
    {
        PHPUnit::assertIsNotWritable($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a file/dir is readable.
     *
     * @param string $message
     *
     * @return self
     */
    public function isReadable(string $message = ''): self
    {
        PHPUnit::assertIsReadable($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a file/dir is writable.
     *
     * @param string $message
     *
     * @return self
     */
    public function isWritable(string $message = ''): self
    {
        PHPUnit::assertIsWritable($this->actual, $message);

        return $this;
    }
}
