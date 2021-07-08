<?php

namespace Realodix\NextProject\Assert;

use PHPUnit\Framework\Assert as PHPUnit;
use Realodix\NextProject\Assert;

class AssertJsonFile extends Assert
{
    public function __construct(string $actualFile)
    {
        parent::__construct($actualFile);
    }

    /**
     * Verifies that two JSON files are equal.
     *
     * @param string $expectedFile
     * @param string $message
     *
     * @return self
     */
    public function equalsJsonFile(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertJsonFileEqualsJsonFile($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that two JSON files are not equal.
     *
     * @param string $expectedFile
     * @param string $message
     *
     * @return self
     */
    public function notEqualsJsonFile(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertJsonFileNotEqualsJsonFile($expectedFile, $this->actual, $message);

        return $this;
    }
}
