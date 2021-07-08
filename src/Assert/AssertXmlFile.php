<?php

namespace Realodix\NextProject\Assert;

use PHPUnit\Framework\Assert as PHPUnit;
use Realodix\NextProject\Assert;

class AssertXmlFile extends Assert
{
    public function __construct(string $actualFile)
    {
        parent::__construct($actualFile);
    }

    /**
     * Verifies that two XML files are equal.
     *
     * @param string $expectedFile
     * @param string $message
     *
     * @return self
     */
    public function equalsXmlFile(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertXmlFileEqualsXmlFile($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that two XML files are not equal.
     *
     * @param string $expectedFile
     * @param string $message
     *
     * @return self
     */
    public function notEqualsXmlFile(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertXmlFileNotEqualsXmlFile($expectedFile, $this->actual, $message);

        return $this;
    }
}
