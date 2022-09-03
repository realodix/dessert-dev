<?php

namespace Realodix\Dessert;

use PHPUnit\Framework\Assert;
use Realodix\Dessert\Support\Validator;

class Assertion
{
    use Traits\PHPUnitPolyfillTrait;
    use Traits\PHPUnitShortNameTrait;
    use Traits\PHPUnitCustomTrait;
    use Traits\CustomTrait;

    /**
     * @var mixed
     */
    public $actual;

    /**
     * @param mixed $actual
     */
    public function __construct($actual)
    {
        $this->actual = $actual;
    }

    /**
     * Dynamically calls methods on the class without any arguments
     */
    public function __get(string $name)
    {
        return $this->{$name}();
    }

    /**
     * Creates a new expectation.
     *
     * @param mixed $actual
     */
    public function and($actual): Assertion
    {
        return new self($actual);
    }

    /**
     * Creates an expectation on each item of the iterable "value".
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
     * @param int|string $key
     */
    public function arrayHasKey($key, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'array|ArrayAccess');
        Validator::expectedValue($key, 'int|string');

        Assert::assertArrayHasKey($key, $this->actual, $message);

        return $this;
    }

    /**
     * @param int|string $key
     */
    public function arrayNotHasKey($key, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'array|ArrayAccess');
        Validator::expectedValue($key, 'int|string');

        Assert::assertArrayNotHasKey($key, $this->actual, $message);

        return $this;
    }

    public function stringContainsString(string $needle, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertStringContainsString($needle, $this->actual, $message);

        return $this;
    }

    public function stringNotContainsString(string $needle, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertStringNotContainsString($needle, $this->actual, $message);

        return $this;
    }

    public function stringContainsStringIgnoringCase(string $needle, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertStringContainsStringIgnoringCase($needle, $this->actual, $message);

        return $this;
    }

    public function stringNotContainsStringIgnoringCase(string $needle, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertStringNotContainsStringIgnoringCase($needle, $this->actual, $message);

        return $this;
    }

    /**
     * @param mixed $needle
     */
    public function containsEquals($needle, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'iterable');

        Assert::assertContainsEquals($needle, $this->actual, $message);

        return $this;
    }

    /**
     * @param mixed $needle
     */
    public function notContainsEquals($needle, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'iterable');

        Assert::assertNotContainsEquals($needle, $this->actual, $message);

        return $this;
    }

    public function containsOnly(string $type, ?bool $isNativeType = null, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'iterable');

        Assert::assertContainsOnly($type, $this->actual, $isNativeType, $message);

        return $this;
    }

    public function notContainsOnly(string $type, ?bool $isNativeType = null, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'iterable');

        Assert::assertNotContainsOnly($type, $this->actual, $isNativeType, $message);

        return $this;
    }

    public function containsOnlyInstancesOf(string $className, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'iterable');

        Assert::assertContainsOnlyInstancesOf($className, $this->actual, $message);

        return $this;
    }

    public function count(int $expectedCount, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'iterable|Countable');

        Assert::assertCount($expectedCount, $this->actual, $message);

        return $this;
    }

    public function notCount(int $expectedCount, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'iterable|Countable');

        Assert::assertNotCount($expectedCount, $this->actual, $message);

        return $this;
    }

    public function directoryExists(string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertDirectoryExists($this->actual, $message);

        return $this;
    }

    public function directoryDoesNotExist(string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertDirectoryDoesNotExist($this->actual, $message);

        return $this;
    }

    public function directoryIsReadable(string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertDirectoryIsReadable($this->actual, $message);

        return $this;
    }

    public function directoryIsNotReadable(string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertDirectoryIsNotReadable($this->actual, $message);

        return $this;
    }

    public function directoryIsWritable(string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertDirectoryIsWritable($this->actual, $message);

        return $this;
    }

    public function directoryIsNotWritable(string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertDirectoryIsNotWritable($this->actual, $message);

        return $this;
    }

    public function empty(string $message = ''): self
    {
        Assert::assertEmpty($this->actual, $message);

        return $this;
    }

    public function notEmpty(string $message = ''): self
    {
        Assert::assertNotEmpty($this->actual, $message);

        return $this;
    }

    /**
     * @param mixed $expected
     */
    public function equals($expected, string $message = ''): self
    {
        Assert::assertEquals($expected, $this->actual, $message);

        return $this;
    }

    /**
     * @param mixed $expected
     */
    public function notEquals($expected, string $message = ''): self
    {
        Assert::assertNotEquals($expected, $this->actual, $message);

        return $this;
    }

    /**
     * @param mixed $expected
     */
    public function equalsCanonicalizing($expected, string $message = ''): self
    {
        Assert::assertEqualsCanonicalizing($expected, $this->actual, $message);

        return $this;
    }

    /**
     * @param mixed $expected
     */
    public function notEqualsCanonicalizing($expected, string $message = ''): self
    {
        Assert::assertNotEqualsCanonicalizing($expected, $this->actual, $message);

        return $this;
    }

    /**
     * @param mixed $expected
     */
    public function equalsIgnoringCase($expected, string $message = ''): self
    {
        Assert::assertEqualsIgnoringCase($expected, $this->actual, $message);

        return $this;
    }

    /**
     * @param mixed $expected
     */
    public function notEqualsIgnoringCase($expected, string $message = ''): self
    {
        Assert::assertNotEqualsIgnoringCase($expected, $this->actual, $message);

        return $this;
    }

    /**
     * @param mixed $expected
     */
    public function equalsWithDelta($expected, float $delta, string $message = ''): self
    {
        Assert::assertEqualsWithDelta($expected, $this->actual, $delta, $message);

        return $this;
    }

    /**
     * @param mixed $expected
     */
    public function notEqualsWithDelta($expected, float $delta, string $message = ''): self
    {
        Assert::assertNotEqualsWithDelta($expected, $this->actual, $delta, $message);

        return $this;
    }

    public function objectEquals(object $expected, string $method = 'equals', string $message = ''): self
    {
        Validator::actualValue($this->actual, 'object');

        Assert::assertObjectEquals($expected, $this->actual, $method, $message);

        return $this;
    }

    public function fileEquals(string $expected, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertFileEquals($expected, $this->actual, $message);

        return $this;
    }

    public function fileNotEquals(string $expected, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertFileNotEquals($expected, $this->actual, $message);

        return $this;
    }

    public function fileEqualsCanonicalizing(string $expected, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertFileEqualsCanonicalizing($expected, $this->actual, $message);

        return $this;
    }

    public function fileNotEqualsCanonicalizing(string $expected, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertFileNotEqualsCanonicalizing($expected, $this->actual, $message);

        return $this;
    }

    public function fileEqualsIgnoringCase(string $expected, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertFileEqualsIgnoringCase($expected, $this->actual, $message);

        return $this;
    }

    public function fileNotEqualsIgnoringCase(string $expected, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertFileNotEqualsIgnoringCase($expected, $this->actual, $message);

        return $this;
    }

    public function stringEqualsFileCanonicalizing(string $expectedFile, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertStringEqualsFileCanonicalizing($expectedFile, $this->actual, $message);

        return $this;
    }

    public function stringNotEqualsFileCanonicalizing(string $expectedFile, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertStringNotEqualsFileCanonicalizing($expectedFile, $this->actual, $message);

        return $this;
    }

    public function stringEqualsFileIgnoringCase(string $expectedFile, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertStringEqualsFileIgnoringCase($expectedFile, $this->actual, $message);

        return $this;
    }

    public function stringNotEqualsFileIgnoringCase(string $expectedFile, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertStringNotEqualsFileIgnoringCase($expectedFile, $this->actual, $message);

        return $this;
    }

    public function fileExists(string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertFileExists($this->actual, $message);

        return $this;
    }

    public function fileDoesNotExist(string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertFileDoesNotExist($this->actual, $message);

        return $this;
    }

    public function fileIsReadable(string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertFileIsReadable($this->actual, $message);

        return $this;
    }

    public function fileIsNotReadable(string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertFileIsNotReadable($this->actual, $message);

        return $this;
    }

    public function fileIsWritable(string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertFileIsWritable($this->actual, $message);

        return $this;
    }

    public function fileIsNotWritable(string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertFileIsNotWritable($this->actual, $message);

        return $this;
    }

    public function finite(string $message = ''): self
    {
        Assert::assertFinite($this->actual, $message);

        return $this;
    }

    public function infinite(string $message = ''): self
    {
        Assert::assertInfinite($this->actual, $message);

        return $this;
    }

    /**
     * @param mixed $expected
     */
    public function greaterThan($expected, string $message = ''): self
    {
        Assert::assertGreaterThan($expected, $this->actual, $message);

        return $this;
    }

    /**
     * @param mixed $expected
     */
    public function greaterThanOrEqual($expected, string $message = ''): self
    {
        Assert::assertGreaterThanOrEqual($expected, $this->actual, $message);

        return $this;
    }

    /**
     * @param mixed $expected
     */
    public function lessThan($expected, string $message = ''): self
    {
        Assert::assertLessThan($expected, $this->actual, $message);

        return $this;
    }

    /**
     * @param mixed $expected
     */
    public function lessThanOrEqual($expected, string $message = ''): self
    {
        Assert::assertLessThanOrEqual($expected, $this->actual, $message);

        return $this;
    }

    public function instanceOf(string $expected, string $message = ''): self
    {
        if (! class_exists($expected) && ! interface_exists($expected)) {
            throw new \InvalidArgumentException(sprintf(
                'Class or interface "%s" does not exist',
                $expected
            ));
        }

        Assert::assertInstanceOf($expected, $this->actual, $message);

        return $this;
    }

    public function notInstanceOf(string $expected, string $message = ''): self
    {
        if (! class_exists($expected) && ! interface_exists($expected)) {
            throw new \InvalidArgumentException(sprintf(
                'Class or interface "%s" does not exist',
                $expected
            ));
        }

        Assert::assertNotInstanceOf($expected, $this->actual, $message);

        return $this;
    }

    public function isArray(string $message = ''): self
    {
        Assert::assertIsArray($this->actual, $message);

        return $this;
    }

    public function isNotArray(string $message = ''): self
    {
        Assert::assertIsNotArray($this->actual, $message);

        return $this;
    }

    public function isBool(string $message = ''): self
    {
        Assert::assertIsBool($this->actual, $message);

        return $this;
    }

    public function isNotBool(string $message = ''): self
    {
        Assert::assertIsNotBool($this->actual, $message);

        return $this;
    }

    public function isCallable(string $message = ''): self
    {
        Assert::assertIsCallable($this->actual, $message);

        return $this;
    }

    public function isNotCallable(string $message = ''): self
    {
        Assert::assertIsNotCallable($this->actual, $message);

        return $this;
    }

    public function isFloat(string $message = ''): self
    {
        Assert::assertIsFloat($this->actual, $message);

        return $this;
    }

    public function isNotFloat(string $message = ''): self
    {
        Assert::assertIsNotFloat($this->actual, $message);

        return $this;
    }

    public function isInt(string $message = ''): self
    {
        Assert::assertIsInt($this->actual, $message);

        return $this;
    }

    public function isNotInt(string $message = ''): self
    {
        Assert::assertIsNotInt($this->actual, $message);

        return $this;
    }

    public function isIterable(string $message = ''): self
    {
        Assert::assertIsIterable($this->actual, $message);

        return $this;
    }

    public function isNotIterable(string $message = ''): self
    {
        Assert::assertIsNotIterable($this->actual, $message);

        return $this;
    }

    public function matchesRegularExpression(string $pattern, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertMatchesRegularExpression($pattern, $this->actual, $message);

        return $this;
    }

    public function doesNotMatchRegularExpression(string $pattern, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertDoesNotMatchRegularExpression($pattern, $this->actual, $message);

        return $this;
    }

    public function isNumeric(string $message = ''): self
    {
        Assert::assertIsNumeric($this->actual, $message);

        return $this;
    }

    public function isNotNumeric(string $message = ''): self
    {
        Assert::assertIsNotNumeric($this->actual, $message);

        return $this;
    }

    public function isObject(string $message = ''): self
    {
        Assert::assertIsObject($this->actual, $message);

        return $this;
    }

    public function isNotObject(string $message = ''): self
    {
        Assert::assertIsNotObject($this->actual, $message);

        return $this;
    }

    public function isReadable(string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertIsReadable($this->actual, $message);

        return $this;
    }

    public function isNotReadable(string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertIsNotReadable($this->actual, $message);

        return $this;
    }

    public function isResource(string $message = ''): self
    {
        Assert::assertIsResource($this->actual, $message);

        return $this;
    }

    public function isNotResource(string $message = ''): self
    {
        Assert::assertIsNotResource($this->actual, $message);

        return $this;
    }

    public function isClosedResource(string $message = ''): self
    {
        Assert::assertIsClosedResource($this->actual, $message);

        return $this;
    }

    public function isNotClosedResource(string $message = ''): self
    {
        Assert::assertIsNotClosedResource($this->actual, $message);

        return $this;
    }

    public function isScalar(string $message = ''): self
    {
        Assert::assertIsScalar($this->actual, $message);

        return $this;
    }

    public function isNotScalar(string $message = ''): self
    {
        Assert::assertIsNotScalar($this->actual, $message);

        return $this;
    }

    public function isString(string $message = ''): self
    {
        Assert::assertIsString($this->actual, $message);

        return $this;
    }

    public function isNotString(string $message = ''): self
    {
        Assert::assertIsNotString($this->actual, $message);

        return $this;
    }

    public function isWritable(string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertIsWritable($this->actual, $message);

        return $this;
    }

    public function isNotWritable(string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertIsNotWritable($this->actual, $message);

        return $this;
    }

    public function json(string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertJson($this->actual, $message);

        return $this;
    }

    public function jsonFileEqualsJsonFile(string $expectedFile, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertJsonFileEqualsJsonFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function jsonFileNotEqualsJsonFile(string $expectedFile, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertJsonFileNotEqualsJsonFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function jsonStringEqualsJsonFile(string $expectedFile, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertJsonStringEqualsJsonFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function jsonStringNotEqualsJsonFile(string $expectedFile, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertJsonStringNotEqualsJsonFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function jsonStringEqualsJsonString(string $expectedJson, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertJsonStringEqualsJsonString($expectedJson, $this->actual, $message);

        return $this;
    }

    public function jsonStringNotEqualsJsonString(string $expectedJson, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertJsonStringNotEqualsJsonString($expectedJson, $this->actual, $message);

        return $this;
    }

    public function nan(string $message = ''): self
    {
        Assert::assertNan($this->actual, $message);

        return $this;
    }

    public function null(string $message = ''): self
    {
        Assert::assertNull($this->actual, $message);

        return $this;
    }

    public function notNull(string $message = ''): self
    {
        Assert::assertNotNull($this->actual, $message);

        return $this;
    }

    public function stringMatchesFormat(string $format, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertStringMatchesFormat($format, $this->actual, $message);

        return $this;
    }

    public function stringNotMatchesFormat(string $format, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertStringNotMatchesFormat($format, $this->actual, $message);

        return $this;
    }

    public function stringMatchesFormatFile(string $formatFile, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertStringMatchesFormatFile($formatFile, $this->actual, $message);

        return $this;
    }

    public function stringNotMatchesFormatFile(string $formatFile, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertStringNotMatchesFormatFile($formatFile, $this->actual, $message);

        return $this;
    }

    /**
     * @param mixed $expected
     */
    public function same($expected, string $message = ''): self
    {
        Assert::assertSame($expected, $this->actual, $message);

        return $this;
    }

    /**
     * @param mixed $expected
     */
    public function notSame($expected, string $message = ''): self
    {
        Assert::assertNotSame($expected, $this->actual, $message);

        return $this;
    }

    /**
     * @param countable|iterable $expected
     */
    public function sameSize($expected, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'array');
        Validator::expectedValue($expected, 'countable|iterable');

        Assert::assertSameSize($expected, $this->actual, $message);

        return $this;
    }

    /**
     * @param countable|iterable $expected
     */
    public function notSameSize($expected, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'array');
        Validator::expectedValue($expected, 'countable|iterable');

        Assert::assertNotSameSize($expected, $this->actual, $message);

        return $this;
    }

    public function stringStartsWith(string $prefix, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertStringStartsWith($prefix, $this->actual, $message);

        return $this;
    }

    public function stringStartsNotWith(string $prefix, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertStringStartsNotWith($prefix, $this->actual, $message);

        return $this;
    }

    public function stringEndsWith(string $suffix, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertStringEndsWith($suffix, $this->actual, $message);

        return $this;
    }

    public function stringEndsNotWith(string $suffix, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertStringEndsNotWith($suffix, $this->actual, $message);

        return $this;
    }

    public function true(string $message = ''): self
    {
        Assert::assertTrue($this->actual, $message);

        return $this;
    }

    public function notTrue(string $message = ''): self
    {
        Assert::assertNotTrue($this->actual, $message);

        return $this;
    }

    public function false(string $message = ''): self
    {
        Assert::assertFalse($this->actual, $message);

        return $this;
    }

    public function notFalse(string $message = ''): self
    {
        Assert::assertNotFalse($this->actual, $message);

        return $this;
    }

    public function xmlFileEqualsXmlFile(string $expectedFile, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertXmlFileEqualsXmlFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function xmlFileNotEqualsXmlFile(string $expectedFile, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertXmlFileNotEqualsXmlFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function xmlStringEqualsXmlFile(string $expectedFile, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertXmlStringEqualsXmlFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function xmlStringNotEqualsXmlFile(string $expectedFile, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertXmlStringNotEqualsXmlFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function xmlStringEqualsXmlString(string $expectedXml, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertXmlStringEqualsXmlString($expectedXml, $this->actual, $message);

        return $this;
    }

    public function xmlStringNotEqualsXmlString(string $expectedXml, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        Assert::assertXmlStringNotEqualsXmlString($expectedXml, $this->actual, $message);

        return $this;
    }
}
