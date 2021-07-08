<?php

namespace Realodix\NextProject\BddStyles;

use function basename;
use DOMDocument;
use function is_string;
use PHPUnit\Framework\Assert as PHPUnit;
use Realodix\NextProject\Exception\InvalidVerifyException;
use Realodix\NextProject\Expect;

class BddXmlString extends Expect
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
     * Expect that two XML documents are not equal.
     *
     * @param string $expectedFile
     * @param string $message
     *
     * @return self
     */
    public function notToEqualXmlFile(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertXmlStringNotEqualsXmlFile($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that two XML documents are not equal.
     *
     * @param DOMDocument|string $expectedXml
     * @param string             $message
     *
     * @return self
     */
    public function notToEqualXmlString($expectedXml, string $message = ''): self
    {
        PHPUnit::assertXmlStringNotEqualsXmlString($expectedXml, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that two XML documents are equal.
     *
     * @param string $expectedFile
     * @param string $message
     *
     * @return self
     */
    public function toEqualXmlFile(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertXmlStringEqualsXmlFile($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that two XML documents are equal.
     *
     * @param DOMDocument|string $expectedXml
     * @param string             $message
     *
     * @return self
     */
    public function toEqualXmlString($expectedXml, string $message = ''): self
    {
        PHPUnit::assertXmlStringEqualsXmlString($expectedXml, $this->actual, $message);

        return $this;
    }
}
