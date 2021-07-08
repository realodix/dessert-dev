<?php

namespace Realodix\NextProject\Expectations;

use PHPUnit\Framework\Assert as PHPUnit;
use Realodix\NextProject\Expect;

class ExpectXmlFile extends Expect
{
    public function __construct(string $actualFile)
    {
        parent::__construct($actualFile);
    }

    /**
     * Expect that two XML files are not equal.
     *
     * @param string $expectedFile
     * @param string $message
     *
     * @return self
     */
    public function notToEqualXmlFile(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertXmlFileNotEqualsXmlFile($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that two XML files are equal.
     *
     * @param string $expectedFile
     * @param string $message
     *
     * @return self
     */
    public function toEqualXmlFile(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertXmlFileEqualsXmlFile($expectedFile, $this->actual, $message);

        return $this;
    }
}
