<?php

namespace Realodix\NextProject\Verifiers;

use PHPUnit\Framework\Assert;
use Realodix\NextProject\Verify;

class VerifyJsonFile extends Verify
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
        Assert::assertJsonFileEqualsJsonFile($expectedFile, $this->actual, $message);

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
        Assert::assertJsonFileNotEqualsJsonFile($expectedFile, $this->actual, $message);

        return $this;
    }
}
