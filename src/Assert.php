<?php

namespace Realodix\NextProject;

use PHPUnit\Framework\Assert as PHPUnit;
use PHPUnit\Runner\Version as PHPUnitVersion;

class Assert
{
    use Traits\AssertArrayTrait;
    use Traits\AssertClassTrait;
    use Traits\AssertDataTrait;
    use Traits\AssertDataTypeTrait;
    use Traits\AssertFileDirectoryTrait;
    use Traits\AssertJsonTrait;
    use Traits\AssertStringTrait;
    use Traits\AssertThrowsTrait;
    use Traits\ShortcutTrait;

    /** @var mixed */
    protected $actual = null;

    /**
     * @param mixed $actual
     */
    public function __construct($actual)
    {
        $this->actual = $actual;
    }

    /**
     * @param mixed $actual
     *
     * @return self
     */
    public function __invoke($actual): self
    {
        return $this($actual);
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
            // @codeCoverageIgnoreStart
            PHPUnit::assertEquals($expected, $this->actual, $message, 0.0, 10, true);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertEqualsCanonicalizing($expected, $this->actual, $message);

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
            // @codeCoverageIgnoreStart
            PHPUnit::assertEquals($expected, $this->actual, $message, $delta);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertEqualsWithDelta($expected, $this->actual, $delta, $message);

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
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotEquals($expected, $this->actual, $message, 0.0, 10, true);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertNotEqualsCanonicalizing($expected, $this->actual, $message);

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
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotEquals($expected, $this->actual, $message, $delta);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertNotEqualsWithDelta($expected, $this->actual, $delta, $message);

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
