<?php

namespace Realodix\NextProject;

use PHPUnit\Framework\Assert;

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
     * @param TValue $value
     *
     * @return self<TValue>
     */
    public function and($value): Assertion
    {
        return new self($value);
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

    public function arrayHasKey($key, $message = ''): self
    {
        Assert::assertArrayHasKey($key, $this->actual, $message);

        return $this;
    }

    public function arrayNotHasKey($key, $message = ''): self
    {
        Assert::assertArrayNotHasKey($key, $this->actual, $message);

        return $this;
    }

    public function containsOnly($type, $isNativeType = null, $message = ''): self
    {
        Assert::assertContainsOnly($type, $this->actual, $isNativeType, $message);

        return $this;
    }

    public function notContainsOnly($type, $isNativeType = null, $message = ''): self
    {
        Assert::assertNotContainsOnly($type, $this->actual, $isNativeType, $message);

        return $this;
    }

    public function containsOnlyInstancesOf($className, $message = ''): self
    {
        Assert::assertContainsOnlyInstancesOf($className, $this->actual, $message);

        return $this;
    }

    public function count($expectedCount, $message = ''): self
    {
        Assert::assertCount($expectedCount, $this->actual, $message);

        return $this;
    }

    public function notCount($expectedCount, $message = ''): self
    {
        Assert::assertNotCount($expectedCount, $this->actual, $message);

        return $this;
    }

    public function equals($expected, $message = ''): self
    {
        Assert::assertEquals($expected, $this->actual, $message);

        return $this;
    }

    public function notEquals($expected, $message = ''): self
    {
        Assert::assertNotEquals($expected, $this->actual, $message);

        return $this;
    }

    public function equalsCanonicalizing($expected, $message = ''): self
    {
        Assert::assertEqualsCanonicalizing($expected, $this->actual, $message);

        return $this;
    }

    public function notEqualsCanonicalizing($expected, $message = ''): self
    {
        Assert::assertNotEqualsCanonicalizing($expected, $this->actual, $message);

        return $this;
    }

    public function equalsIgnoringCase($expected, $message = ''): self
    {
        Assert::assertEqualsIgnoringCase($expected, $this->actual, $message);

        return $this;
    }

    public function notEqualsIgnoringCase($expected, $message = ''): self
    {
        Assert::assertNotEqualsIgnoringCase($expected, $this->actual, $message);

        return $this;
    }

    public function equalsWithDelta($expected, $delta, $message = ''): self
    {
        Assert::assertEqualsWithDelta($expected, $this->actual, $delta, $message);

        return $this;
    }

    public function notEqualsWithDelta($expected, $delta, $message = ''): self
    {
        Assert::assertNotEqualsWithDelta($expected, $this->actual, $delta, $message);

        return $this;
    }

    public function classHasAttribute($attributeName, $message = ''): self
    {
        Assert::assertClassHasAttribute($attributeName, $this->actual, $message);

        return $this;
    }

    public function classNotHasAttribute($attributeName, $message = ''): self
    {
        Assert::assertClassNotHasAttribute($attributeName, $this->actual, $message);

        return $this;
    }

    public function classHasStaticAttribute($attributeName, $message = ''): self
    {
        Assert::assertClassHasStaticAttribute($attributeName, $this->actual, $message);

        return $this;
    }

    public function classNotHasStaticAttribute($attributeName, $message = ''): self
    {
        Assert::assertClassNotHasStaticAttribute($attributeName, $this->actual, $message);

        return $this;
    }

    public function directoryExists($message = ''): self
    {
        Assert::assertDirectoryExists($this->actual, $message);

        return $this;
    }

    public function directoryIsReadable($message = ''): self
    {
        Assert::assertDirectoryIsReadable($this->actual, $message);

        return $this;
    }

    public function directoryIsWritable($message = ''): self
    {
        Assert::assertDirectoryIsWritable($this->actual, $message);

        return $this;
    }

    public function empty($message = ''): self
    {
        Assert::assertEmpty($this->actual, $message);

        return $this;
    }

    public function notEmpty($message = ''): self
    {
        Assert::assertNotEmpty($this->actual, $message);

        return $this;
    }

    public function fileEquals($expected, $message = ''): self
    {
        Assert::assertFileEquals($expected, $this->actual, $message);

        return $this;
    }

    public function fileNotEquals($expected, $message = ''): self
    {
        Assert::assertFileNotEquals($expected, $this->actual, $message);

        return $this;
    }

    public function fileExists($message = ''): self
    {
        Assert::assertFileExists($this->actual, $message);

        return $this;
    }

    public function fileIsReadable($message = ''): self
    {
        Assert::assertFileIsReadable($this->actual, $message);

        return $this;
    }

    public function fileIsWritable($message = ''): self
    {
        Assert::assertFileIsWritable($this->actual, $message);

        return $this;
    }

    public function true($message = ''): self
    {
        Assert::assertTrue($this->actual, $message);

        return $this;
    }

    public function notTrue($message = ''): self
    {
        Assert::assertNotTrue($this->actual, $message);

        return $this;
    }

    public function false($message = ''): self
    {
        Assert::assertFalse($this->actual, $message);

        return $this;
    }

    public function notFalse($message = ''): self
    {
        Assert::assertNotFalse($this->actual, $message);

        return $this;
    }

    public function null($message = ''): self
    {
        Assert::assertNull($this->actual, $message);

        return $this;
    }

    public function notNull($message = ''): self
    {
        Assert::assertNotNull($this->actual, $message);

        return $this;
    }

    public function finite($message = ''): self
    {
        Assert::assertFinite($this->actual, $message);

        return $this;
    }

    public function infinite($message = ''): self
    {
        Assert::assertInfinite($this->actual, $message);

        return $this;
    }

    public function nan($message = ''): self
    {
        Assert::assertNan($this->actual, $message);

        return $this;
    }

    public function greaterThan($expected, $message = ''): self
    {
        Assert::assertGreaterThan($expected, $this->actual, $message);

        return $this;
    }

    public function lessThan($expected, $message = ''): self
    {
        Assert::assertLessThan($expected, $this->actual, $message);

        return $this;
    }

    public function greaterThanOrEqual($expected, $message = ''): self
    {
        Assert::assertGreaterThanOrEqual($expected, $this->actual, $message);

        return $this;
    }

    public function lessThanOrEqual($expected, $message = ''): self
    {
        Assert::assertLessThanOrEqual($expected, $this->actual, $message);

        return $this;
    }

    public function instanceOf($expected, $message = ''): self
    {
        Assert::assertInstanceOf($expected, $this->actual, $message);

        return $this;
    }

    public function notInstanceOf($expected, $message = ''): self
    {
        Assert::assertNotInstanceOf($expected, $this->actual, $message);

        return $this;
    }

    public function isArray($message = ''): self
    {
        Assert::assertIsArray($this->actual, $message);

        return $this;
    }

    public function isNotArray($message = ''): self
    {
        Assert::assertIsNotArray($this->actual, $message);

        return $this;
    }

    public function isBool($message = ''): self
    {
        Assert::assertIsBool($this->actual, $message);

        return $this;
    }

    public function isNotBool($message = ''): self
    {
        Assert::assertIsNotBool($this->actual, $message);

        return $this;
    }

    public function isCallable($message = ''): self
    {
        Assert::assertIsCallable($this->actual, $message);

        return $this;
    }

    public function isNotCallable($message = ''): self
    {
        Assert::assertIsNotCallable($this->actual, $message);

        return $this;
    }

    public function isFloat($message = ''): self
    {
        Assert::assertIsFloat($this->actual, $message);

        return $this;
    }

    public function isNotFloat($message = ''): self
    {
        Assert::assertIsNotFloat($this->actual, $message);

        return $this;
    }

    public function isInt($message = ''): self
    {
        Assert::assertIsInt($this->actual, $message);

        return $this;
    }

    public function isNotInt($message = ''): self
    {
        Assert::assertIsNotInt($this->actual, $message);

        return $this;
    }

    public function isIterable($message = ''): self
    {
        Assert::assertIsIterable($this->actual, $message);

        return $this;
    }

    public function isNotIterable($message = ''): self
    {
        Assert::assertIsNotIterable($this->actual, $message);

        return $this;
    }

    public function isNumeric($message = ''): self
    {
        Assert::assertIsNumeric($this->actual, $message);

        return $this;
    }

    public function isNotNumeric($message = ''): self
    {
        Assert::assertIsNotNumeric($this->actual, $message);

        return $this;
    }

    public function isObject($message = ''): self
    {
        Assert::assertIsObject($this->actual, $message);

        return $this;
    }

    public function isNotObject($message = ''): self
    {
        Assert::assertIsNotObject($this->actual, $message);

        return $this;
    }

    public function isReadable($message = ''): self
    {
        Assert::assertIsReadable($this->actual, $message);

        return $this;
    }

    public function isResource($message = ''): self
    {
        Assert::assertIsResource($this->actual, $message);

        return $this;
    }

    public function isNotResource($message = ''): self
    {
        Assert::assertIsNotResource($this->actual, $message);

        return $this;
    }

    public function isScalar($message = ''): self
    {
        Assert::assertIsScalar($this->actual, $message);

        return $this;
    }

    public function isNotScalar($message = ''): self
    {
        Assert::assertIsNotScalar($this->actual, $message);

        return $this;
    }

    public function isString($message = ''): self
    {
        Assert::assertIsString($this->actual, $message);

        return $this;
    }

    public function isNotString($message = ''): self
    {
        Assert::assertIsNotString($this->actual, $message);

        return $this;
    }

    public function isWritable($message = ''): self
    {
        Assert::assertIsWritable($this->actual, $message);

        return $this;
    }

    public function json($message = ''): self
    {
        Assert::assertJson($this->actual, $message);

        return $this;
    }

    public function jsonFileEqualsJsonFile($expectedFile, $message = ''): self
    {
        Assert::assertJsonFileEqualsJsonFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function jsonFileNotEqualsJsonFile($expectedFile, $message = ''): self
    {
        Assert::assertJsonFileNotEqualsJsonFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function jsonStringEqualsJsonFile($expectedFile, $message = ''): self
    {
        Assert::assertJsonStringEqualsJsonFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function jsonStringNotEqualsJsonFile($expectedFile, $message = ''): self
    {
        Assert::assertJsonStringNotEqualsJsonFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function jsonStringEqualsJsonString($expectedJson, $message = ''): self
    {
        Assert::assertJsonStringEqualsJsonString($expectedJson, $this->actual, $message);

        return $this;
    }

    public function jsonStringNotEqualsJsonString($expectedJson, $message = ''): self
    {
        Assert::assertJsonStringNotEqualsJsonString($expectedJson, $this->actual, $message);

        return $this;
    }

    public function objectHasAttribute($attributeName, $message = ''): self
    {
        Assert::assertObjectHasAttribute($attributeName, $this->actual, $message);

        return $this;
    }

    public function objectNotHasAttribute($attributeName, $message = ''): self
    {
        Assert::assertObjectNotHasAttribute($attributeName, $this->actual, $message);

        return $this;
    }

    public function same($expected, $message = ''): self
    {
        Assert::assertSame($expected, $this->actual, $message);

        return $this;
    }

    public function notSame($expected, $message = ''): self
    {
        Assert::assertNotSame($expected, $this->actual, $message);

        return $this;
    }

    public function sameSize($expected, $message = ''): self
    {
        Assert::assertSameSize($expected, $this->actual, $message);

        return $this;
    }

    public function notSameSize($expected, $message = ''): self
    {
        Assert::assertNotSameSize($expected, $this->actual, $message);

        return $this;
    }

    public function stringContainsString($needle, $message = ''): self
    {
        Assert::assertStringContainsString($needle, $this->actual, $message);

        return $this;
    }

    public function stringNotContainsString($needle, $message = ''): self
    {
        Assert::assertStringNotContainsString($needle, $this->actual, $message);

        return $this;
    }

    public function stringContainsStringIgnoringCase($needle, $message = ''): self
    {
        Assert::assertStringContainsStringIgnoringCase($needle, $this->actual, $message);

        return $this;
    }

    public function stringNotContainsStringIgnoringCase($needle, $message = ''): self
    {
        Assert::assertStringNotContainsStringIgnoringCase($needle, $this->actual, $message);

        return $this;
    }

    public function stringMatchesFormat($format, $message = ''): self
    {
        Assert::assertStringMatchesFormat($format, $this->actual, $message);

        return $this;
    }

    public function stringNotMatchesFormat($format, $message = ''): self
    {
        Assert::assertStringNotMatchesFormat($format, $this->actual, $message);

        return $this;
    }

    public function stringMatchesFormatFile($formatFile, $message = ''): self
    {
        Assert::assertStringMatchesFormatFile($formatFile, $this->actual, $message);

        return $this;
    }

    public function stringNotMatchesFormatFile($formatFile, $message = ''): self
    {
        Assert::assertStringNotMatchesFormatFile($formatFile, $this->actual, $message);

        return $this;
    }

    public function stringStartsWith($prefix, $message = ''): self
    {
        Assert::assertStringStartsWith($prefix, $this->actual, $message);

        return $this;
    }

    public function stringStartsNotWith($prefix, $message = ''): self
    {
        Assert::assertStringStartsNotWith($prefix, $this->actual, $message);

        return $this;
    }

    public function stringEndsNotWith($suffix, $message = ''): self
    {
        Assert::assertStringEndsNotWith($suffix, $this->actual, $message);

        return $this;
    }

    public function stringEndsWith($suffix, $message = ''): self
    {
        Assert::assertStringEndsWith($suffix, $this->actual, $message);

        return $this;
    }

    public function xmlFileEqualsXmlFile($expectedFile, $message = ''): self
    {
        Assert::assertXmlFileEqualsXmlFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function xmlFileNotEqualsXmlFile($expectedFile, $message = ''): self
    {
        Assert::assertXmlFileNotEqualsXmlFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function xmlStringEqualsXmlFile($expectedFile, $message = ''): self
    {
        Assert::assertXmlStringEqualsXmlFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function xmlStringNotEqualsXmlFile($expectedFile, $message = ''): self
    {
        Assert::assertXmlStringNotEqualsXmlFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function xmlStringEqualsXmlString($expectedXml, $message = ''): self
    {
        Assert::assertXmlStringEqualsXmlString($expectedXml, $this->actual, $message);

        return $this;
    }

    public function xmlStringNotEqualsXmlString($expectedXml, $message = ''): self
    {
        Assert::assertXmlStringNotEqualsXmlString($expectedXml, $this->actual, $message);

        return $this;
    }
}
