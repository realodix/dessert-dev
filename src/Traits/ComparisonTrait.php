<?php

namespace Realodix\NextProject\Traits;

use PHPUnit\Framework\Assert as PHPUnit;

trait ComparisonTrait
{
    public function containsEquals($needle, string $message = ''): self
    {
        PHPUnit::assertContainsEquals($needle, $this->actual, $message);

        return $this;
    }

    public function equals($expected, string $message = ''): self
    {
        PHPUnit::assertEquals($expected, $this->actual, $message);

        return $this;
    }

    public function equalsCanonicalizing($expected, string $message = ''): self
    {
        PHPUnit::assertEqualsCanonicalizing($expected, $this->actual, $message);

        return $this;
    }

    public function equalsIgnoringCase($expected, string $message = ''): self
    {
        PHPUnit::assertEqualsIgnoringCase($expected, $this->actual, $message);

        return $this;
    }

    public function equalsWithDelta($expected, float $delta, string $message = ''): self
    {
        PHPUnit::assertEqualsWithDelta($expected, $this->actual, $delta, $message);

        return $this;
    }

    public function false(string $message = ''): self
    {
        PHPUnit::assertFalse($this->actual, $message);

        return $this;
    }

    public function fileEquals($expected, string $message = ''): self
    {
        PHPUnit::assertFileEquals($expected, $this->actual, $message);

        return $this;
    }

    public function fileEqualsCanonicalizing(string $expected, string $message = ''): self
    {
        PHPUnit::assertFileEqualsCanonicalizing($expected, $this->actual, $message);

        return $this;
    }

    public function fileEqualsIgnoringCase(string $expected, string $message = ''): self
    {
        PHPUnit::assertFileEqualsIgnoringCase($expected, $this->actual, $message);

        return $this;
    }

    public function fileNotEquals(string $expected, string $message = ''): self
    {
        PHPUnit::assertFileNotEquals($expected, $this->actual, $message);

        return $this;
    }

    public function fileNotEqualsCanonicalizing(string $expected, string $message = ''): self
    {
        PHPUnit::assertFileNotEqualsCanonicalizing($expected, $this->actual, $message);

        return $this;
    }

    public function fileNotEqualsIgnoringCase(string $expected, string $message = ''): self
    {
        PHPUnit::assertFileNotEqualsIgnoringCase($expected, $this->actual, $message);

        return $this;
    }

    public function greaterThan($expected, string $message = ''): self
    {
        PHPUnit::assertGreaterThan($expected, $this->actual, $message);

        return $this;
    }

    public function greaterThanOrEqual($expected, string $message = ''): self
    {
        PHPUnit::assertGreaterThanOrEqual($expected, $this->actual, $message);

        return $this;
    }

    public function jsonFileEqualsJsonFile(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertJsonFileEqualsJsonFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function jsonFileNotEqualsJsonFile(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertJsonFileNotEqualsJsonFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function jsonStringEqualsJsonFile(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertJsonStringEqualsJsonFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function jsonStringEqualsJsonString(string $expectedJson, string $message = ''): self
    {
        PHPUnit::assertJsonStringEqualsJsonString($expectedJson, $this->actual, $message);

        return $this;
    }

    public function jsonStringNotEqualsJsonFile(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertJsonStringNotEqualsJsonFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function jsonStringNotEqualsJsonString($expectedJson, string $message = ''): self
    {
        PHPUnit::assertJsonStringNotEqualsJsonString($expectedJson, $this->actual, $message);

        return $this;
    }

    public function lessThan($expected, string $message = ''): self
    {
        PHPUnit::assertLessThan($expected, $this->actual, $message);

        return $this;
    }

    public function lessThanOrEqual($expected, string $message = ''): self
    {
        PHPUnit::assertLessThanOrEqual($expected, $this->actual, $message);

        return $this;
    }

    public function notContainsEquals($needle, string $message = ''): self
    {
        PHPUnit::assertNotContainsEquals($needle, $this->actual, $message);

        return $this;
    }

    public function notEquals($expected, string $message = ''): self
    {
        PHPUnit::assertNotEquals($expected, $this->actual, $message);

        return $this;
    }

    public function notEqualsCanonicalizing($expected, string $message = ''): self
    {
        PHPUnit::assertNotEqualsCanonicalizing($expected, $this->actual, $message);

        return $this;
    }

    public function notEqualsIgnoringCase($expected, string $message = ''): self
    {
        PHPUnit::assertNotEqualsIgnoringCase($expected, $this->actual, $message);

        return $this;
    }

    public function notEqualsWithDelta($expected, float $delta, string $message = ''): self
    {
        PHPUnit::assertNotEqualsWithDelta($expected, $this->actual, $delta, $message);

        return $this;
    }

    public function notFalse(string $message = ''): self
    {
        PHPUnit::assertNotFalse($this->actual, $message);

        return $this;
    }

    public function notNull(string $message = ''): self
    {
        PHPUnit::assertNotNull($this->actual, $message);

        return $this;
    }

    public function notSame($expected, string $message = ''): self
    {
        PHPUnit::assertNotSame($expected, $this->actual, $message);

        return $this;
    }

    public function notSameSize($expected, string $message = ''): self
    {
        PHPUnit::assertNotSameSize($expected, $this->actual, $message);

        return $this;
    }

    public function notTrue(string $message = ''): self
    {
        PHPUnit::assertNotTrue($this->actual, $message);

        return $this;
    }

    public function null(string $message = ''): self
    {
        PHPUnit::assertNull($this->actual, $message);

        return $this;
    }

    public function same($expected, string $message = ''): self
    {
        PHPUnit::assertSame($expected, $this->actual, $message);

        return $this;
    }

    public function sameSize($expected, string $message = ''): self
    {
        PHPUnit::assertSameSize($expected, $this->actual, $message);

        return $this;
    }

    public function stringEqualsFileCanonicalizing(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertStringEqualsFileCanonicalizing($expectedFile, $this->actual, $message);

        return $this;
    }

    public function stringEqualsFileIgnoringCase(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertStringEqualsFileIgnoringCase($expectedFile, $this->actual, $message);

        return $this;
    }

    public function stringNotEqualsFileCanonicalizing(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertStringNotEqualsFileCanonicalizing($expectedFile, $this->actual, $message);

        return $this;
    }

    public function stringNotEqualsFileIgnoringCase(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertStringNotEqualsFileIgnoringCase($expectedFile, $this->actual, $message);

        return $this;
    }

    public function true(string $message = ''): self
    {
        PHPUnit::assertTrue($this->actual, $message);

        return $this;
    }

    public function xmlFileEqualsXmlFile(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertXmlFileEqualsXmlFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function xmlFileNotEqualsXmlFile(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertXmlFileNotEqualsXmlFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function xmlStringEqualsXmlFile(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertXmlStringEqualsXmlFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function xmlStringEqualsXmlString($expectedXml, string $message = ''): self
    {
        PHPUnit::assertXmlStringEqualsXmlString($expectedXml, $this->actual, $message);

        return $this;
    }

    public function xmlStringNotEqualsXmlFile(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertXmlStringNotEqualsXmlFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function xmlStringNotEqualsXmlString($expectedXml, string $message = ''): self
    {
        PHPUnit::assertXmlStringNotEqualsXmlString($expectedXml, $this->actual, $message);

        return $this;
    }
}
