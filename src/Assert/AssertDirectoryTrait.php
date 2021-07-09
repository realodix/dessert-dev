<?php

namespace Realodix\NextProject\Assert;

use PHPUnit\Framework\Assert as PHPUnit;

trait AssertDirectoryTrait
{
    public function directoryDoesNotExist(string $message = ''): self
    {
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
        PHPUnit::assertDirectoryIsNotReadable($this->actual, $message);

        return $this;
    }

    public function directoryIsNotWritable(string $message = ''): self
    {
        Assert::dir($this->actual)->isNotWritable($message);

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
}
