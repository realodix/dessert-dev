<?php

namespace Realodix\NextProject;

use PHPUnit\Framework\Assert;
use Realodix\NextProject\Support\Validator;

class Assertion
{
    use Traits\PHPUnitPolyfillTrait;
    use Traits\PHPUnitShortNameTrait;
    use Traits\PHPUnitCustomTrait;
    use Traits\CustomTrait;

    /** @var mixed */
    public $actual = null;

    /**
     * @param mixed $actual
     */
    public function __construct($actual)
    {
        $this->actual = $actual;
    }

    /**
     * Dynamically calls methods on the class without any arguments
     *
     * @param string $name
     */
    public function __get(string $name)
    {
        return $this->{$name}();
    }

    /**
     * Creates a new expectation.
     *
     * @param mixed $actual
     *
     * @return self
     */
    public function and($actual): Assertion
    {
        return new self($actual);
    }

    /**
     * Creates a new expectation.
     *
     * @param mixed $actual
     *
     * @return self
     */
    private function actual($actual): Assertion
    {
        return new self($actual);
    }

    /**
     * Creates an expectation on each item of the iterable "value".
     *
     * @param null|callable $callback
     */
    public function each(callable $callback = null): Each
    {
        if (! is_iterable($this->actual)) {
            throw new \BadMethodCallException('An actual value must be iterable.');
        }

        if (\is_callable($callback)) {
            foreach ($this->actual as $item) {
                $callback(new self($item));
            }
        }

        return new Each($this);
    }

    /**
     * Creates the opposite expectation for the value.
     */
    public function not(): Opposite
    {
        return new Opposite($this);
    }

    /**
     * @param string $needle
     * @param string $message
     */
    public function stringContainsString(string $needle, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertStringContainsString($needle, $actual, $message);

        return $this;
    }

    /**
     * @param string $needle
     * @param string $message
     */
    public function stringNotContainsString(string $needle, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertStringNotContainsString($needle, $actual, $message);

        return $this;
    }

    /**
     * @param string $needle
     * @param string $message
     */
    public function stringContainsStringIgnoringCase(string $needle, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertStringContainsStringIgnoringCase($needle, $actual, $message);

        return $this;
    }

    /**
     * @param string $needle
     * @param string $message
     */
    public function stringNotContainsStringIgnoringCase(string $needle, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertStringNotContainsStringIgnoringCase($needle, $actual, $message);

        return $this;
    }

    /**
     * @param string    $type
     * @param bool|null $isNativeType
     * @param string    $message
     */
    public function containsOnly(string $type, ?bool $isNativeType = null, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'iterable');

        Assert::assertContainsOnly($type, $actual, $isNativeType, $message);

        return $this;
    }

    /**
     * @param string    $type
     * @param bool|null $isNativeType
     * @param string    $message
     */
    public function notContainsOnly(string $type, ?bool $isNativeType = null, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'iterable');

        Assert::assertNotContainsOnly($type, $actual, $isNativeType, $message);

        return $this;
    }

    /**
     * @param string $className
     * @param string $message
     */
    public function containsOnlyInstancesOf(string $className, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'iterable');

        Assert::assertContainsOnlyInstancesOf($className, $actual, $message);

        return $this;
    }

    /**
     * @param int    $expectedCount
     * @param string $message
     */
    public function count(int $expectedCount, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'iterable|countable');

        Assert::assertCount($expectedCount, $actual, $message);

        return $this;
    }

    /**
     * @param int    $expectedCount
     * @param string $message
     */
    public function notCount(int $expectedCount, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'iterable|countable');

        Assert::assertNotCount($expectedCount, $actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function directoryExists(string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertDirectoryExists($actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function directoryIsReadable(string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertDirectoryIsReadable($actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function directoryIsWritable(string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertDirectoryIsWritable($actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function empty(string $message = ''): self
    {
        Assert::assertEmpty($this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function notEmpty(string $message = ''): self
    {
        Assert::assertNotEmpty($this->actual, $message);

        return $this;
    }

    /**
     * @param mixed  $expected
     * @param string $message
     */
    public function equals($expected, string $message = ''): self
    {
        Assert::assertEquals($expected, $this->actual, $message);

        return $this;
    }

    /**
     * @param mixed  $expected
     * @param string $message
     */
    public function notEquals($expected, string $message = ''): self
    {
        Assert::assertNotEquals($expected, $this->actual, $message);

        return $this;
    }

    /**
     * @param mixed  $expected
     * @param string $message
     */
    public function equalsCanonicalizing($expected, string $message = ''): self
    {
        Assert::assertEqualsCanonicalizing($expected, $this->actual, $message);

        return $this;
    }

    /**
     * @param mixed  $expected
     * @param string $message
     */
    public function notEqualsCanonicalizing($expected, string $message = ''): self
    {
        Assert::assertNotEqualsCanonicalizing($expected, $this->actual, $message);

        return $this;
    }

    /**
     * @param mixed  $expected
     * @param string $message
     */
    public function equalsIgnoringCase($expected, string $message = ''): self
    {
        Assert::assertEqualsIgnoringCase($expected, $this->actual, $message);

        return $this;
    }

    /**
     * @param mixed  $expected
     * @param string $message
     */
    public function notEqualsIgnoringCase($expected, string $message = ''): self
    {
        Assert::assertNotEqualsIgnoringCase($expected, $this->actual, $message);

        return $this;
    }

    /**
     * @param mixed  $expected
     * @param float  $delta
     * @param string $message
     */
    public function equalsWithDelta($expected, float $delta, string $message = ''): self
    {
        Assert::assertEqualsWithDelta($expected, $this->actual, $delta, $message);

        return $this;
    }

    /**
     * @param mixed  $expected
     * @param float  $delta
     * @param string $message
     */
    public function notEqualsWithDelta($expected, float $delta, string $message = ''): self
    {
        Assert::assertNotEqualsWithDelta($expected, $this->actual, $delta, $message);

        return $this;
    }

    /**
     * @param string $expected
     * @param string $message
     */
    public function fileEquals(string $expected, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertFileEquals($expected, $actual, $message);

        return $this;
    }

    /**
     * @param string $expected
     * @param string $message
     */
    public function fileNotEquals(string $expected, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertFileNotEquals($expected, $actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function fileExists(string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertFileExists($actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function fileIsReadable(string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertFileIsReadable($actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function fileIsWritable(string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertFileIsWritable($actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function finite(string $message = ''): self
    {
        Assert::assertFinite($this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function infinite(string $message = ''): self
    {
        Assert::assertInfinite($this->actual, $message);

        return $this;
    }

    /**
     * @param mixed  $expected
     * @param string $message
     */
    public function greaterThan($expected, string $message = ''): self
    {
        Assert::assertGreaterThan($expected, $this->actual, $message);

        return $this;
    }

    /**
     * @param mixed  $expected
     * @param string $message
     */
    public function greaterThanOrEqual($expected, string $message = ''): self
    {
        Assert::assertGreaterThanOrEqual($expected, $this->actual, $message);

        return $this;
    }

    /**
     * @param mixed  $expected
     * @param string $message
     */
    public function lessThan($expected, string $message = ''): self
    {
        Assert::assertLessThan($expected, $this->actual, $message);

        return $this;
    }

    /**
     * @param mixed  $expected
     * @param string $message
     */
    public function lessThanOrEqual($expected, string $message = ''): self
    {
        Assert::assertLessThanOrEqual($expected, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $expected
     * @param string $message
     */
    public function instanceOf(string $expected, string $message = ''): self
    {
        // $expected = Validator::expectedValue($expected, 'class');

        Assert::assertInstanceOf($expected, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $expected
     * @param string $message
     */
    public function notInstanceOf(string $expected, string $message = ''): self
    {
        // $expected = Validator::expectedValue($expected, 'class');

        Assert::assertNotInstanceOf($expected, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function isArray(string $message = ''): self
    {
        Assert::assertIsArray($this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function isNotArray(string $message = ''): self
    {
        Assert::assertIsNotArray($this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function isBool(string $message = ''): self
    {
        Assert::assertIsBool($this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function isNotBool(string $message = ''): self
    {
        Assert::assertIsNotBool($this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function isCallable(string $message = ''): self
    {
        Assert::assertIsCallable($this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function isNotCallable(string $message = ''): self
    {
        Assert::assertIsNotCallable($this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function isFloat(string $message = ''): self
    {
        Assert::assertIsFloat($this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function isNotFloat(string $message = ''): self
    {
        Assert::assertIsNotFloat($this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function isInt(string $message = ''): self
    {
        Assert::assertIsInt($this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function isNotInt(string $message = ''): self
    {
        Assert::assertIsNotInt($this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function isIterable(string $message = ''): self
    {
        Assert::assertIsIterable($this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function isNotIterable(string $message = ''): self
    {
        Assert::assertIsNotIterable($this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function isNumeric(string $message = ''): self
    {
        Assert::assertIsNumeric($this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function isNotNumeric(string $message = ''): self
    {
        Assert::assertIsNotNumeric($this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function isObject(string $message = ''): self
    {
        Assert::assertIsObject($this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function isNotObject(string $message = ''): self
    {
        Assert::assertIsNotObject($this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function isReadable(string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertIsReadable($actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function isResource(string $message = ''): self
    {
        Assert::assertIsResource($this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function isNotResource(string $message = ''): self
    {
        Assert::assertIsNotResource($this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function isScalar(string $message = ''): self
    {
        Assert::assertIsScalar($this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function isNotScalar(string $message = ''): self
    {
        Assert::assertIsNotScalar($this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function isString(string $message = ''): self
    {
        Assert::assertIsString($this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function isNotString(string $message = ''): self
    {
        Assert::assertIsNotString($this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function isWritable(string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertIsWritable($actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function json(string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertJson($actual, $message);

        return $this;
    }

    /**
     * @param string $expectedFile
     * @param string $message
     */
    public function jsonFileEqualsJsonFile(string $expectedFile, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertJsonFileEqualsJsonFile($expectedFile, $actual, $message);

        return $this;
    }

    /**
     * @param string $expectedFile
     * @param string $message
     */
    public function jsonFileNotEqualsJsonFile(string $expectedFile, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertJsonFileNotEqualsJsonFile($expectedFile, $actual, $message);

        return $this;
    }

    /**
     * @param string $expectedFile
     * @param string $message
     */
    public function jsonStringEqualsJsonFile(string $expectedFile, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertJsonStringEqualsJsonFile($expectedFile, $actual, $message);

        return $this;
    }

    /**
     * @param string $expectedFile
     * @param string $message
     */
    public function jsonStringNotEqualsJsonFile(string $expectedFile, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertJsonStringNotEqualsJsonFile($expectedFile, $actual, $message);

        return $this;
    }

    /**
     * @param string $expectedJson
     * @param string $message
     */
    public function jsonStringEqualsJsonString(string $expectedJson, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertJsonStringEqualsJsonString($expectedJson, $actual, $message);

        return $this;
    }

    /**
     * @param string $expectedJson
     * @param string $message
     */
    public function jsonStringNotEqualsJsonString(string $expectedJson, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertJsonStringNotEqualsJsonString($expectedJson, $actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function nan(string $message = ''): self
    {
        Assert::assertNan($this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function null(string $message = ''): self
    {
        Assert::assertNull($this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function notNull(string $message = ''): self
    {
        Assert::assertNotNull($this->actual, $message);

        return $this;
    }

    /**
     * @param string $format
     * @param string $message
     */
    public function stringMatchesFormat(string $format, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertStringMatchesFormat($format, $actual, $message);

        return $this;
    }

    /**
     * @param string $format
     * @param string $message
     */
    public function stringNotMatchesFormat(string $format, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertStringNotMatchesFormat($format, $actual, $message);

        return $this;
    }

    /**
     * @param string $formatFile
     * @param string $message
     */
    public function stringMatchesFormatFile(string $formatFile, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertStringMatchesFormatFile($formatFile, $actual, $message);

        return $this;
    }

    /**
     * @param string $formatFile
     * @param string $message
     */
    public function stringNotMatchesFormatFile(string $formatFile, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertStringNotMatchesFormatFile($formatFile, $actual, $message);

        return $this;
    }

    /**
     * @param mixed  $expected
     * @param string $message
     */
    public function same($expected, string $message = ''): self
    {
        Assert::assertSame($expected, $this->actual, $message);

        return $this;
    }

    /**
     * @param mixed  $expected
     * @param string $message
     */
    public function notSame($expected, string $message = ''): self
    {
        Assert::assertNotSame($expected, $this->actual, $message);

        return $this;
    }

    /**
     * @param mixed  $expected
     * @param string $message
     */
    public function sameSize($expected, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'array');
        $expected = Validator::expectedValue($expected, 'array');

        Assert::assertSameSize($expected, $actual, $message);

        return $this;
    }

    /**
     * @param mixed  $expected
     * @param string $message
     */
    public function notSameSize($expected, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'array');
        $expected = Validator::expectedValue($expected, 'array');

        Assert::assertNotSameSize($expected, $actual, $message);

        return $this;
    }

    /**
     * @param string $prefix
     * @param string $message
     */
    public function stringStartsWith(string $prefix, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertStringStartsWith($prefix, $actual, $message);

        return $this;
    }

    /**
     * @param string $prefix
     * @param string $message
     */
    public function stringStartsNotWith(string $prefix, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertStringStartsNotWith($prefix, $actual, $message);

        return $this;
    }

    /**
     * @param string $suffix
     * @param string $message
     */
    public function stringEndsWith(string $suffix, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertStringEndsWith($suffix, $actual, $message);

        return $this;
    }

    /**
     * @param string $suffix
     * @param string $message
     */
    public function stringEndsNotWith(string $suffix, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertStringEndsNotWith($suffix, $actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function true(string $message = ''): self
    {
        Assert::assertTrue($this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function notTrue(string $message = ''): self
    {
        Assert::assertNotTrue($this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function false(string $message = ''): self
    {
        Assert::assertFalse($this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function notFalse(string $message = ''): self
    {
        Assert::assertNotFalse($this->actual, $message);

        return $this;
    }

    /**
     * @param string $expectedFile
     * @param string $message
     */
    public function xmlFileEqualsXmlFile(string $expectedFile, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertXmlFileEqualsXmlFile($expectedFile, $actual, $message);

        return $this;
    }

    /**
     * @param string $expectedFile
     * @param string $message
     */
    public function xmlFileNotEqualsXmlFile(string $expectedFile, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertXmlFileNotEqualsXmlFile($expectedFile, $actual, $message);

        return $this;
    }

    /**
     * @param string $expectedFile
     * @param string $message
     */
    public function xmlStringEqualsXmlFile(string $expectedFile, string $message = ''): self
    {
        Assert::assertXmlStringEqualsXmlFile($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $expectedFile
     * @param string $message
     */
    public function xmlStringNotEqualsXmlFile(string $expectedFile, string $message = ''): self
    {
        Assert::assertXmlStringNotEqualsXmlFile($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * @param mixed  $expectedXml
     * @param string $message
     */
    public function xmlStringEqualsXmlString($expectedXml, string $message = ''): self
    {
        Assert::assertXmlStringEqualsXmlString($expectedXml, $this->actual, $message);

        return $this;
    }

    /**
     * @param mixed  $expectedXml
     * @param string $message
     */
    public function xmlStringNotEqualsXmlString($expectedXml, string $message = ''): self
    {
        Assert::assertXmlStringNotEqualsXmlString($expectedXml, $this->actual, $message);

        return $this;
    }
}
