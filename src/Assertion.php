<?php

namespace Realodix\NextProject;

use PHPUnit\Framework\Assert;
use Realodix\NextProject\Exception\InvalidActualValueException;

class Assertion
{
    use Traits\AliasesTrait;
    use Traits\ExtendedTrait;
    use Traits\PolyfillTrait;

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
     * Creates an expectation on each item of the iterable "value".
     *
     * @param null|callable $callback
     */
    public function each(callable $callback = null): Each
    {
        if (! is_iterable($this->actual)) {
            throw new \BadMethodCallException('Expectation value is not iterable.');
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
     * @param int|string $key
     * @param string     $message
     */
    public function arrayHasKey($key, string $message = ''): self
    {
        if (! (\is_array($this->actual) || $this->actual instanceof ArrayAccess)) {
            throw InvalidActualValueException::create(
                'array or ArrayAccess'
            );
        }

        Assert::assertArrayHasKey($key, $this->actual, $message);

        return $this;
    }

    /**
     * @param int|string $key
     * @param string     $message
     */
    public function arrayNotHasKey($key, string $message = ''): self
    {
        if (! (\is_array($this->actual) || $this->actual instanceof ArrayAccess)) {
            throw InvalidActualValueException::create(
                'array or ArrayAccess'
            );
        }

        Assert::assertArrayNotHasKey($key, $this->actual, $message);

        return $this;
    }

    /**
     * @param string    $type
     * @param bool|null $isNativeType
     * @param string    $message
     */
    public function containsOnly(string $type, ?bool $isNativeType = null, string $message = ''): self
    {
        if (! is_iterable($this->actual)) {
            throw InvalidActualValueException::create('iterable');
        }

        Assert::assertContainsOnly($type, $this->actual, $isNativeType, $message);

        return $this;
    }

    /**
     * @param string    $type
     * @param bool|null $isNativeType
     * @param string    $message
     */
    public function notContainsOnly(string $type, ?bool $isNativeType = null, string $message = ''): self
    {
        if (! is_iterable($this->actual)) {
            throw InvalidActualValueException::create('iterable');
        }

        Assert::assertNotContainsOnly($type, $this->actual, $isNativeType, $message);

        return $this;
    }

    /**
     * @param string $className
     * @param string $message
     */
    public function containsOnlyInstancesOf(string $className, string $message = ''): self
    {
        if (! is_iterable($this->actual)) {
            throw InvalidActualValueException::create('iterable');
        }

        Assert::assertContainsOnlyInstancesOf($className, $this->actual, $message);

        return $this;
    }

    /**
     * @param int    $expectedCount
     * @param string $message
     */
    public function count(int $expectedCount, string $message = ''): self
    {
        if (! $this->actual instanceof Countable && ! is_iterable($this->actual)) {
            throw InvalidActualValueException::create('countable or iterable');
        }

        Assert::assertCount($expectedCount, $this->actual, $message);

        return $this;
    }

    /**
     * @param int    $expectedCount
     * @param string $message
     */
    public function notCount(int $expectedCount, string $message = ''): self
    {
        if (! $this->actual instanceof Countable && ! is_iterable($this->actual)) {
            throw InvalidActualValueException::create('countable or iterable');
        }

        Assert::assertNotCount($expectedCount, $this->actual, $message);

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
     * @param string $attributeName
     * @param string $message
     */
    public function classHasAttribute(string $attributeName, string $message = ''): self
    {
        Assert::assertClassHasAttribute($attributeName, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $attributeName
     * @param string $message
     */
    public function classNotHasAttribute(string $attributeName, string $message = ''): self
    {
        Assert::assertClassNotHasAttribute($attributeName, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $attributeName
     * @param string $message
     */
    public function classHasStaticAttribute(string $attributeName, string $message = ''): self
    {
        Assert::assertClassHasStaticAttribute($attributeName, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $attributeName
     * @param string $message
     */
    public function classNotHasStaticAttribute(string $attributeName, string $message = ''): self
    {
        Assert::assertClassNotHasStaticAttribute($attributeName, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function directoryExists(string $message = ''): self
    {
        Assert::assertDirectoryExists($this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function directoryIsReadable(string $message = ''): self
    {
        Assert::assertDirectoryIsReadable($this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function directoryIsWritable(string $message = ''): self
    {
        Assert::assertDirectoryIsWritable($this->actual, $message);

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
     * @param string $expected
     * @param string $message
     */
    public function fileEquals(string $expected, string $message = ''): self
    {
        Assert::assertFileEquals($expected, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $expected
     * @param string $message
     */
    public function fileNotEquals(string $expected, string $message = ''): self
    {
        Assert::assertFileNotEquals($expected, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function fileExists(string $message = ''): self
    {
        Assert::assertFileExists($this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function fileIsReadable(string $message = ''): self
    {
        Assert::assertFileIsReadable($this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function fileIsWritable(string $message = ''): self
    {
        Assert::assertFileIsWritable($this->actual, $message);

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
     * @param string $message
     */
    public function nan(string $message = ''): self
    {
        Assert::assertNan($this->actual, $message);

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
    public function lessThan($expected, string $message = ''): self
    {
        Assert::assertLessThan($expected, $this->actual, $message);

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
        Assert::assertInstanceOf($expected, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $expected
     * @param string $message
     */
    public function notInstanceOf(string $expected, string $message = ''): self
    {
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
        Assert::assertIsReadable($this->actual, $message);

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
        Assert::assertIsWritable($this->actual, $message);

        return $this;
    }

    /**
     * @param string $message
     */
    public function json(string $message = ''): self
    {
        Assert::assertJson($this->actual, $message);

        return $this;
    }

    /**
     * @param string $expectedFile
     * @param string $message
     */
    public function jsonFileEqualsJsonFile(string $expectedFile, string $message = ''): self
    {
        Assert::assertJsonFileEqualsJsonFile($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $expectedFile
     * @param string $message
     */
    public function jsonFileNotEqualsJsonFile(string $expectedFile, string $message = ''): self
    {
        Assert::assertJsonFileNotEqualsJsonFile($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $expectedFile
     * @param string $message
     */
    public function jsonStringEqualsJsonFile(string $expectedFile, string $message = ''): self
    {
        Assert::assertJsonStringEqualsJsonFile($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $expectedFile
     * @param string $message
     */
    public function jsonStringNotEqualsJsonFile(string $expectedFile, string $message = ''): self
    {
        Assert::assertJsonStringNotEqualsJsonFile($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $expectedJson
     * @param string $message
     */
    public function jsonStringEqualsJsonString(string $expectedJson, string $message = ''): self
    {
        Assert::assertJsonStringEqualsJsonString($expectedJson, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $expectedJson
     * @param string $message
     */
    public function jsonStringNotEqualsJsonString(string $expectedJson, string $message = ''): self
    {
        Assert::assertJsonStringNotEqualsJsonString($expectedJson, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $attributeName
     * @param string $message
     */
    public function objectHasAttribute(string $attributeName, string $message = ''): self
    {
        Assert::assertObjectHasAttribute($attributeName, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $attributeName
     * @param string $message
     */
    public function objectNotHasAttribute(string $attributeName, string $message = ''): self
    {
        Assert::assertObjectNotHasAttribute($attributeName, $this->actual, $message);

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
        Assert::assertSameSize($expected, $this->actual, $message);

        return $this;
    }

    /**
     * @param mixed  $expected
     * @param string $message
     */
    public function notSameSize($expected, string $message = ''): self
    {
        Assert::assertNotSameSize($expected, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $needle
     * @param string $message
     */
    public function stringContainsString(string $needle, string $message = ''): self
    {
        Assert::assertStringContainsString($needle, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $needle
     * @param string $message
     */
    public function stringNotContainsString(string $needle, string $message = ''): self
    {
        Assert::assertStringNotContainsString($needle, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $needle
     * @param string $message
     */
    public function stringContainsStringIgnoringCase(string $needle, string $message = ''): self
    {
        Assert::assertStringContainsStringIgnoringCase($needle, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $needle
     * @param string $message
     */
    public function stringNotContainsStringIgnoringCase(string $needle, string $message = ''): self
    {
        Assert::assertStringNotContainsStringIgnoringCase($needle, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $format
     * @param string $message
     */
    public function stringMatchesFormat(string $format, string $message = ''): self
    {
        Assert::assertStringMatchesFormat($format, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $format
     * @param string $message
     */
    public function stringNotMatchesFormat(string $format, string $message = ''): self
    {
        Assert::assertStringNotMatchesFormat($format, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $formatFile
     * @param string $message
     */
    public function stringMatchesFormatFile(string $formatFile, string $message = ''): self
    {
        Assert::assertStringMatchesFormatFile($formatFile, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $formatFile
     * @param string $message
     */
    public function stringNotMatchesFormatFile(string $formatFile, string $message = ''): self
    {
        Assert::assertStringNotMatchesFormatFile($formatFile, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $prefix
     * @param string $message
     */
    public function stringStartsWith(string $prefix, string $message = ''): self
    {
        Assert::assertStringStartsWith($prefix, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $prefix
     * @param string $message
     */
    public function stringStartsNotWith(string $prefix, string $message = ''): self
    {
        Assert::assertStringStartsNotWith($prefix, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $suffix
     * @param string $message
     */
    public function stringEndsNotWith(string $suffix, string $message = ''): self
    {
        Assert::assertStringEndsNotWith($suffix, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $suffix
     * @param string $message
     */
    public function stringEndsWith(string $suffix, string $message = ''): self
    {
        Assert::assertStringEndsWith($suffix, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $expectedFile
     * @param string $message
     */
    public function xmlFileEqualsXmlFile(string $expectedFile, string $message = ''): self
    {
        Assert::assertXmlFileEqualsXmlFile($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * @param string $expectedFile
     * @param string $message
     */
    public function xmlFileNotEqualsXmlFile(string $expectedFile, string $message = ''): self
    {
        Assert::assertXmlFileNotEqualsXmlFile($expectedFile, $this->actual, $message);

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
