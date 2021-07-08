<?php

namespace Realodix\NextProject\Traits;

use PHPUnit\Framework\Assert as PHPUnit;

trait ExpectDataTrait
{
    /**
     * Expect that a file/dir is not readable.
     *
     * @param string $message
     *
     * @return self
     */
    public function notToBeReadable(string $message = ''): self
    {
        PHPUnit::assertIsNotReadable($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a file/dir is not writable.
     *
     * @param string $message
     *
     * @return self
     */
    public function notToBeWritable(string $message = ''): self
    {
        PHPUnit::assertIsNotWritable($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a file/dir is readable.
     *
     * @param string $message
     *
     * @return self
     */
    public function toBeReadable(string $message = ''): self
    {
        PHPUnit::assertIsReadable($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a file/dir is writable.
     *
     * @param string $message
     *
     * @return self
     */
    public function toBeWritable(string $message = ''): self
    {
        PHPUnit::assertIsWritable($this->actual, $message);

        return $this;
    }
}
