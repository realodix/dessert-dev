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

    public function stringContainsString(string $needle, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertStringContainsString($needle, $actual, $message);

        return $this;
    }

    public function stringNotContainsString(string $needle, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertStringNotContainsString($needle, $actual, $message);

        return $this;
    }

    public function stringContainsStringIgnoringCase(string $needle, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertStringContainsStringIgnoringCase($needle, $actual, $message);

        return $this;
    }

    public function stringNotContainsStringIgnoringCase(string $needle, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertStringNotContainsStringIgnoringCase($needle, $actual, $message);

        return $this;
    }

    public function containsOnly(string $type, ?bool $isNativeType = null, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'iterable');

        Assert::assertContainsOnly($type, $actual, $isNativeType, $message);

        return $this;
    }

    public function notContainsOnly(string $type, ?bool $isNativeType = null, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'iterable');

        Assert::assertNotContainsOnly($type, $actual, $isNativeType, $message);

        return $this;
    }

    public function containsOnlyInstancesOf(string $className, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'iterable');

        Assert::assertContainsOnlyInstancesOf($className, $actual, $message);

        return $this;
    }

    public function count(int $expectedCount, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'iterable_countable');

        Assert::assertCount($expectedCount, $actual, $message);

        return $this;
    }

    public function notCount(int $expectedCount, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'iterable_countable');

        Assert::assertNotCount($expectedCount, $actual, $message);

        return $this;
    }

    public function directoryExists(string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertDirectoryExists($actual, $message);

        return $this;
    }

    public function directoryIsReadable(string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertDirectoryIsReadable($actual, $message);

        return $this;
    }

    public function directoryIsWritable(string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertDirectoryIsWritable($actual, $message);

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

    public function fileEquals(string $expected, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertFileEquals($expected, $actual, $message);

        return $this;
    }

    public function fileNotEquals(string $expected, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertFileNotEquals($expected, $actual, $message);

        return $this;
    }

    public function fileExists(string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertFileExists($actual, $message);

        return $this;
    }

    public function fileIsReadable(string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertFileIsReadable($actual, $message);

        return $this;
    }

    public function fileIsWritable(string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertFileIsWritable($actual, $message);

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
        $expected = Validator::expectedValue($expected, 1, 'class');

        Assert::assertInstanceOf($expected, $this->actual, $message);

        return $this;
    }

    public function notInstanceOf(string $expected, string $message = ''): self
    {
        $expected = Validator::expectedValue($expected, 1, 'class');

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
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertIsReadable($actual, $message);

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
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertIsWritable($actual, $message);

        return $this;
    }

    public function json(string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertJson($actual, $message);

        return $this;
    }

    public function jsonFileEqualsJsonFile(string $expectedFile, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertJsonFileEqualsJsonFile($expectedFile, $actual, $message);

        return $this;
    }

    public function jsonFileNotEqualsJsonFile(string $expectedFile, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertJsonFileNotEqualsJsonFile($expectedFile, $actual, $message);

        return $this;
    }

    public function jsonStringEqualsJsonFile(string $expectedFile, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertJsonStringEqualsJsonFile($expectedFile, $actual, $message);

        return $this;
    }

    public function jsonStringNotEqualsJsonFile(string $expectedFile, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertJsonStringNotEqualsJsonFile($expectedFile, $actual, $message);

        return $this;
    }

    public function jsonStringEqualsJsonString(string $expectedJson, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertJsonStringEqualsJsonString($expectedJson, $actual, $message);

        return $this;
    }

    public function jsonStringNotEqualsJsonString(string $expectedJson, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertJsonStringNotEqualsJsonString($expectedJson, $actual, $message);

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
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertStringMatchesFormat($format, $actual, $message);

        return $this;
    }

    public function stringNotMatchesFormat(string $format, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertStringNotMatchesFormat($format, $actual, $message);

        return $this;
    }

    public function stringMatchesFormatFile(string $formatFile, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertStringMatchesFormatFile($formatFile, $actual, $message);

        return $this;
    }

    public function stringNotMatchesFormatFile(string $formatFile, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertStringNotMatchesFormatFile($formatFile, $actual, $message);

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
     * @param mixed $expected
     */
    public function sameSize($expected, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'iterable_countable');
        $expected = Validator::expectedValue($expected, 1, 'iterable_countable');

        Assert::assertSameSize($expected, $actual, $message);

        return $this;
    }

    /**
     * @param mixed $expected
     */
    public function notSameSize($expected, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'iterable_countable');
        $expected = Validator::expectedValue($expected, 1, 'iterable_countable');

        Assert::assertNotSameSize($expected, $actual, $message);

        return $this;
    }

    public function stringStartsWith(string $prefix, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertStringStartsWith($prefix, $actual, $message);

        return $this;
    }

    public function stringStartsNotWith(string $prefix, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertStringStartsNotWith($prefix, $actual, $message);

        return $this;
    }

    public function stringEndsWith(string $suffix, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertStringEndsWith($suffix, $actual, $message);

        return $this;
    }

    public function stringEndsNotWith(string $suffix, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertStringEndsNotWith($suffix, $actual, $message);

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
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertXmlFileEqualsXmlFile($expectedFile, $actual, $message);

        return $this;
    }

    public function xmlFileNotEqualsXmlFile(string $expectedFile, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertXmlFileNotEqualsXmlFile($expectedFile, $actual, $message);

        return $this;
    }

    public function xmlStringEqualsXmlFile(string $expectedFile, string $message = ''): self
    {
        Assert::assertXmlStringEqualsXmlFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function xmlStringNotEqualsXmlFile(string $expectedFile, string $message = ''): self
    {
        Assert::assertXmlStringNotEqualsXmlFile($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * @param mixed $expectedXml
     */
    public function xmlStringEqualsXmlString($expectedXml, string $message = ''): self
    {
        Assert::assertXmlStringEqualsXmlString($expectedXml, $this->actual, $message);

        return $this;
    }

    /**
     * @param mixed $expectedXml
     */
    public function xmlStringNotEqualsXmlString($expectedXml, string $message = ''): self
    {
        Assert::assertXmlStringNotEqualsXmlString($expectedXml, $this->actual, $message);

        return $this;
    }
}
