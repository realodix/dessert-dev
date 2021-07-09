<?php

namespace Realodix\NextProject\Assert;

use PHPUnit\Framework\Assert as PHPUnit;
use PHPUnit\Runner\Version as PHPUnitVersion;
use Realodix\NextProject\Traits\ShortcutTrait;

class Assert extends AssertAbstract
{
    use AssertArrayTrait;
    use AssertClassTrait;
    use AssertDataTrait;
    use AssertDataTypeTrait;
    use AssertFileAndDirectoryTrait;
    use AssertJsonTrait;
    use AssertStringTrait;
    use AssertThrowsTrait;
    use ShortcutTrait;

    /**
     * @param mixed $actual
     */
    public function __construct($actual)
    {
        parent::__construct($actual);
    }

    public function doesNotThrow($throws = null, string $message = ''): self
    {
        return $this->assertDoesNotThrow($throws, $message);
    }

    /**
     * Verifies that a variable is empty.
     *
     * @param string $message
     *
     * @return self
     */
    public function empty(string $message = ''): self
    {
        PHPUnit::assertEmpty($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that two variables are equal.
     *
     * @param mixed  $expected
     * @param string $message
     *
     * @return self
     */
    public function equals($expected, string $message = ''): self
    {
        PHPUnit::assertEquals($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that two variables are equal (canonicalizing).
     *
     * @param mixed  $expected
     * @param string $message
     *
     * @return self
     */
    public function equalsCanonicalizing($expected, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            PHPUnit::assertEquals($expected, $this->actual, $message, 0.0, 10, true);

            return $this;
        }

        PHPUnit::assertEqualsCanonicalizing($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that two variables are equal (ignoring case).
     *
     * @param mixed  $expected
     * @param string $message
     *
     * @return self
     */
    public function equalsIgnoringCase($expected, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            PHPUnit::assertEquals($expected, $this->actual, $message, 0.0, 10, false, true);

            return $this;
        }

        PHPUnit::assertEqualsIgnoringCase($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that two variables are equal (with delta).
     *
     * @param mixed  $expected
     * @param float  $delta
     * @param string $message
     *
     * @return self
     */
    public function equalsWithDelta($expected, float $delta, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            PHPUnit::assertEquals($expected, $this->actual, $message, $delta);

            return $this;
        }

        PHPUnit::assertEqualsWithDelta($expected, $this->actual, $delta, $message);

        return $this;
    }

    /**
     * Verifies that a condition is false.
     *
     * @param string $message
     *
     * @return self
     */
    public function false(string $message = ''): self
    {
        PHPUnit::assertFalse($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is finite.
     *
     * @param string $message
     *
     * @return self
     */
    public function finite(string $message = ''): self
    {
        PHPUnit::assertFinite($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a value is greater than another value.
     *
     * @param mixed  $expected
     * @param string $message
     *
     * @return self
     */
    public function greaterThan($expected, string $message = ''): self
    {
        PHPUnit::assertGreaterThan($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a value is greater than or equal to another value.
     *
     * @param mixed  $expected
     * @param string $message
     *
     * @return self
     */
    public function greaterThanOrEqual($expected, string $message = ''): self
    {
        PHPUnit::assertGreaterThanOrEqual($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is infinite.
     *
     * @param string $message
     *
     * @return self
     */
    public function infinite(string $message = ''): self
    {
        PHPUnit::assertInfinite($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is of a given type.
     *
     * @param string $expected
     * @param string $message
     *
     * @return self
     */
    public function instanceOf(string $expected, string $message = ''): self
    {
        PHPUnit::assertInstanceOf($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a value is smaller than another value.
     *
     * @param mixed  $expected
     * @param string $message
     *
     * @return self
     */
    public function lessThan($expected, string $message = ''): self
    {
        PHPUnit::assertLessThan($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a value is smaller than or equal to another value.
     *
     * @param mixed  $expected
     * @param string $message
     *
     * @return self
     */
    public function lessThanOrEqual($expected, string $message = ''): self
    {
        PHPUnit::assertLessThanOrEqual($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is nan.
     *
     * @param string $message
     *
     * @return self
     */
    public function nan(string $message = ''): self
    {
        PHPUnit::assertNan($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is not empty.
     *
     * @param string $message
     *
     * @return self
     */
    public function notEmpty(string $message = ''): self
    {
        PHPUnit::assertNotEmpty($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that two variables are not equal.
     *
     * @param mixed  $expected
     * @param string $message
     *
     * @return self
     */
    public function notEquals($expected, string $message = ''): self
    {
        PHPUnit::assertNotEquals($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that two variables are not equal (canonicalizing).
     *
     * @param mixed  $expected
     * @param string $message
     *
     * @return self
     */
    public function notEqualsCanonicalizing($expected, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            PHPUnit::assertNotEquals($expected, $this->actual, $message, 0.0, 10, true);

            return $this;
        }

        PHPUnit::assertNotEqualsCanonicalizing($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that two variables are not equal (ignoring case).
     *
     * @param mixed  $expected
     * @param string $message
     *
     * @return self
     */
    public function notEqualsIgnoringCase($expected, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            PHPUnit::assertNotEquals($expected, $this->actual, $message, 0.0, 10, false, true);

            return $this;
        }

        PHPUnit::assertNotEqualsIgnoringCase($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that two variables are not equal (with delta).
     *
     * @param mixed  $expected
     * @param float  $delta
     * @param string $message
     *
     * @return self
     */
    public function notEqualsWithDelta($expected, float $delta, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            PHPUnit::assertNotEquals($expected, $this->actual, $message, $delta);

            return $this;
        }

        PHPUnit::assertNotEqualsWithDelta($expected, $this->actual, $delta, $message);

        return $this;
    }

    /**
     * Verifies that a condition is not false.
     *
     * @param string $message
     *
     * @return self
     */
    public function notFalse(string $message = ''): self
    {
        PHPUnit::assertNotFalse($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is not of a given type.
     *
     * @param string $expected
     * @param string $message
     *
     * @return self
     */
    public function notInstanceOf(string $expected, string $message = ''): self
    {
        PHPUnit::assertNotInstanceOf($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is not null.
     *
     * @param string $message
     *
     * @return self
     */
    public function notNull(string $message = ''): self
    {
        PHPUnit::assertNotNull($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that two variables do not have the same type and value.
     *
     * @param mixed  $expected
     * @param string $message
     *
     * @return self
     */
    public function notSame($expected, string $message = ''): self
    {
        PHPUnit::assertNotSame($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a condition is not true.
     *
     * @param string $message
     *
     * @return self
     */
    public function notTrue(string $message = ''): self
    {
        PHPUnit::assertNotTrue($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is null.
     *
     * @param string $message
     *
     * @return self
     */
    public function null(string $message = ''): self
    {
        PHPUnit::assertNull($this->actual, $message);

        return $this;
    }

    public function objectHasAttribute($attributeName, string $message = ''): self
    {
        PHPUnit::assertObjectHasAttribute($attributeName, $this->actual, $message);

        return $this;
    }

    public function objectNotHasAttribute($attributeName, string $message = ''): self
    {
        PHPUnit::assertObjectNotHasAttribute($attributeName, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that two variables have the same type and value.
     *
     * @param mixed  $expected
     * @param string $message
     *
     * @return self
     */
    public function same($expected, string $message = ''): self
    {
        PHPUnit::assertSame($expected, $this->actual, $message);

        return $this;
    }

    public function throws($throws = null, string $message = ''): self
    {
        return $this->assertThrows($throws, $message);
    }

    /**
     * Verifies that a condition is true.
     *
     * @param string $message
     *
     * @return self
     */
    public function true(string $message = ''): self
    {
        PHPUnit::assertTrue($this->actual, $message);

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
