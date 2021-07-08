<?php

namespace Realodix\NextProject\Assert;

use function basename;
use DOMDocument;
use function is_string;
use PHPUnit\Framework\Assert as PHPUnit;
use Realodix\NextProject\Assert;
use Realodix\NextProject\Exception\InvalidVerifyException;

class AssertXmlString extends Assert
{
    /**
     * @param DOMDocument|string $actualXml
     */
    public function __construct($actualXml)
    {
        if (is_string($actualXml) || $actualXml instanceof DOMDocument) {
            parent::__construct($actualXml);

            return;
        }
        throw new InvalidVerifyException(basename(self::class), $actualXml);
    }

    /**
     * Verifies that two XML documents are equal.
     *
     * @param string $expectedFile
     * @param string $message
     *
     * @return self
     */
    public function equalsXmlFile(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertXmlStringEqualsXmlFile($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that two XML documents are equal.
     *
     * @param DOMDocument|string $expectedXml
     * @param string             $message
     *
     * @return self
     */
    public function equalsXmlString($expectedXml, string $message = ''): self
    {
        PHPUnit::assertXmlStringEqualsXmlString($expectedXml, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that two XML documents are not equal.
     *
     * @param string $expectedFile
     * @param string $message
     *
     * @return self
     */
    public function notEqualsXmlFile(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertXmlStringNotEqualsXmlFile($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that two XML documents are not equal.
     *
     * @param DOMDocument|string $expectedXml
     * @param string             $message
     *
     * @return self
     */
    public function notEqualsXmlString($expectedXml, string $message = ''): self
    {
        PHPUnit::assertXmlStringNotEqualsXmlString($expectedXml, $this->actual, $message);

        return $this;
    }
}
