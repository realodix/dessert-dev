<?php

namespace Realodix\NextProject\BddStyles;

use PHPUnit\Framework\Assert as PHPUnit;
use Realodix\NextProject\Expect;

class ExpectJsonFile extends Expect
{
    public function __construct(string $actualFile)
    {
        parent::__construct($actualFile);
    }

    /**
     * Expect that two JSON files are not equal.
     *
     * @param string $expectedFile
     * @param string $message
     *
     * @return self
     */
    public function notToEqualJsonFile(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertJsonFileNotEqualsJsonFile($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that two JSON files are equal.
     *
     * @param string $expectedFile
     * @param string $message
     *
     * @return self
     */
    public function toEqualJsonFile(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertJsonFileEqualsJsonFile($expectedFile, $this->actual, $message);

        return $this;
    }
}
