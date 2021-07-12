<?php

namespace Realodix\NextProject\Traits;

use PHPUnit\Framework\Assert as PHPUnit;
use PHPUnit\Framework\Constraint\LogicalNot;
use PHPUnit\Framework\Constraint\TraversableContains;
use PHPUnit\Runner\Version as PHPUnitVersion;

trait ComparisonTrait
{
    /**
     * Asserts that a haystack contains a needle.
     *
     * @param mixed  $needle
     * @param string $message
     */
    public function containsEquals($needle, string $message = ''): self
    {
        // https://github.com/sebastianbergmann/phpunit/issues/3511
        if (version_compare(PHPUnitVersion::series(), '8.1', '<')) {
            // @codeCoverageIgnoreStart
            $constraint = new TraversableContains($needle);

            PHPUnit::assertThat($this->actual, $constraint, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertContainsEquals($needle, $this->actual, $message);

        return $this;
    }

    public function equals($expected, string $message = ''): self
    {
        PHPUnit::assertEquals($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a haystack contains a needle.
     *
     * @param mixed  $expected
     * @param string $message
     */
    public function equalsCanonicalizing($expected, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertEquals($expected, $this->actual, $message, 0.0, 10, true);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertEqualsCanonicalizing($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Asserts that two variables are equal (ignoring case).
     *
     * @param mixed  $expected
     * @param string $message
     */
    public function equalsIgnoringCase($expected, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertEquals($expected, $this->actual, $message, 0.0, 10, false, true);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertEqualsIgnoringCase($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Asserts that two variables are equal (with delta).
     *
     * @param mixed  $expected
     * @param float  $delta
     * @param string $message
     */
    public function equalsWithDelta($expected, float $delta, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertEquals($expected, $this->actual, $message, $delta);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertEqualsWithDelta($expected, $this->actual, $delta, $message);

        return $this;
    }

    public function fileEquals($expected, string $message = ''): self
    {
        PHPUnit::assertFileEquals($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Asserts that the contents of one file is equal to the contents of another file
     * (canonicalizing).
     *
     * @param string $expected
     * @param string $message
     */
    public function fileEqualsCanonicalizing(string $expected, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '8.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertFileEquals($expected, $this->actual, $message, true);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertFileEqualsCanonicalizing($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Asserts that the contents of one file is equal to the contents of another file
     * (ignoring case).
     *
     * @param string $expected
     * @param string $message
     */
    public function fileEqualsIgnoringCase(string $expected, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '8.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertFileEquals($expected, $this->actual, $message, false, true);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertFileEqualsIgnoringCase($expected, $this->actual, $message);

        return $this;
    }

    public function fileNotEquals($expected, string $message = ''): self
    {
        PHPUnit::assertFileNotEquals($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Asserts that the contents of one file is not equal to the contents of another file
     * (canonicalizing).
     *
     * @param string $expected
     * @param string $message
     */
    public function fileNotEqualsCanonicalizing(string $expected, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '8.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertFileNotEquals($expected, $this->actual, $message, true);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertFileNotEqualsCanonicalizing($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Asserts that the contents of one file is not equal to the contents of another file
     * (ignoring case).
     *
     * @param string $expected
     * @param string $message
     */
    public function fileNotEqualsIgnoringCase(string $expected, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '8.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertFileNotEquals($expected, $this->actual, $message, false, true);

            return $this;
            // @codeCoverageIgnoreEnd
        }

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

    public function jsonFileEqualsJsonFile($expectedFile, string $message = ''): self
    {
        PHPUnit::assertJsonFileEqualsJsonFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function jsonFileNotEqualsJsonFile($expectedFile, string $message = ''): self
    {
        PHPUnit::assertJsonFileNotEqualsJsonFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function jsonStringEqualsJsonFile($expectedFile, string $message = ''): self
    {
        PHPUnit::assertJsonStringEqualsJsonFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function jsonStringEqualsJsonString($expectedJson, string $message = ''): self
    {
        PHPUnit::assertJsonStringEqualsJsonString($expectedJson, $this->actual, $message);

        return $this;
    }

    public function jsonStringNotEqualsJsonFile($expectedFile, string $message = ''): self
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

    /**
     * Asserts that a haystack does not contain a needle.
     *
     * @param mixed  $needle
     * @param string $message
     */
    public function notContainsEquals($needle, string $message = ''): self
    {
        // https://github.com/sebastianbergmann/phpunit/issues/3511
        if (version_compare(PHPUnitVersion::series(), '8.1', '<')) {
            // @codeCoverageIgnoreStart
            $constraint = new LogicalNot(new TraversableContains($needle, false, false));

            PHPUnit::assertThat($this->actual, $constraint, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertNotContainsEquals($needle, $this->actual, $message);

        return $this;
    }

    public function notEquals($expected, string $message = ''): self
    {
        PHPUnit::assertNotEquals($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Asserts that two variables are not equal (canonicalizing).
     *
     * @param mixed  $expected
     * @param string $message
     */
    public function notEqualsCanonicalizing($expected, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotEquals($expected, $this->actual, $message, 0.0, 10, true);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertNotEqualsCanonicalizing($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Asserts that two variables are not equal (ignoring case).
     *
     * @param mixed  $expected
     * @param string $message
     */
    public function notEqualsIgnoringCase($expected, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotEquals($expected, $this->actual, $message, 0.0, 10, false, true);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertNotEqualsIgnoringCase($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Asserts that two variables are not equal (with delta).
     *
     * @param mixed  $expected
     * @param float  $delta
     * @param string $message
     */
    public function notEqualsWithDelta($expected, float $delta, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotEquals($expected, $this->actual, $message, $delta);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertNotEqualsWithDelta($expected, $this->actual, $delta, $message);

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

    public function stringEqualsFile($expectedFile, string $message = ''): self
    {
        PHPUnit::assertStringEqualsFile($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * Asserts that the contents of a string is equal to the contents of a file
     * (canonicalizing).
     *
     * @param string $expectedFile
     * @param string $message
     */
    public function stringEqualsFileCanonicalizing(string $expectedFile, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '8.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertStringEqualsFile($expectedFile, $this->actual, $message, true);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertStringEqualsFileCanonicalizing($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * Asserts that the contents of a string is equal to the contents of a file (ignoring
     * case).
     *
     * @param string $expectedFile
     * @param string $message
     */
    public function stringEqualsFileIgnoringCase(string $expectedFile, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '8.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertStringEqualsFile($expectedFile, $this->actual, $message, false, true);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertStringEqualsFileIgnoringCase($expectedFile, $this->actual, $message);

        return $this;
    }

    public function stringNotEqualsFile($expectedFile, string $message = ''): self
    {
        PHPUnit::assertStringNotEqualsFile($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * Asserts that the contents of a string is not equal to the contents of a file
     * (canonicalizing).
     *
     * @param string $expectedFile
     * @param string $message
     */
    public function stringNotEqualsFileCanonicalizing(string $expectedFile, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '8.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertStringNotEqualsFile($expectedFile, $this->actual, $message, true);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertStringNotEqualsFileCanonicalizing($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * Asserts that the contents of a string is not equal to the contents of a file
     * (ignoring case).
     *
     * @param string $expectedFile
     * @param string $message
     */
    public function stringNotEqualsFileIgnoringCase(string $expectedFile, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '8.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertStringNotEqualsFile($expectedFile, $this->actual, $message, false, true);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertStringNotEqualsFileIgnoringCase($expectedFile, $this->actual, $message);

        return $this;
    }

    public function xmlFileEqualsXmlFile($expectedFile, string $message = ''): self
    {
        PHPUnit::assertXmlFileEqualsXmlFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function xmlFileNotEqualsXmlFile($expectedFile, string $message = ''): self
    {
        PHPUnit::assertXmlFileNotEqualsXmlFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function xmlStringEqualsXmlFile($expectedFile, string $message = ''): self
    {
        PHPUnit::assertXmlStringEqualsXmlFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function xmlStringEqualsXmlString($expectedXml, string $message = ''): self
    {
        PHPUnit::assertXmlStringEqualsXmlString($expectedXml, $this->actual, $message);

        return $this;
    }

    public function xmlStringNotEqualsXmlFile($expectedFile, string $message = ''): self
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
