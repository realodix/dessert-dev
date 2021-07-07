<?php

namespace Realodix\NextProject\Verifiers;

use PHPUnit\Framework\Assert;
use Realodix\NextProject\Verify;

class VerifyAny extends Verify
{
    /**
     * @param mixed $actual
     */
    public function __construct($actual)
    {
        parent::__construct($actual);
    }

    public function arrayContains($needle, string $message = ''): self
    {
        Verify::Array($this->actual)->contains($needle, $message);

        return $this;
    }

    public function arrayContainsEquals($needle, string $message = ''): self
    {
        Verify::Array($this->actual)->containsEquals($needle, $message);

        return $this;
    }

    public function arrayContainsOnly($type, $isNativeType = null, string $message = ''): self
    {
        Verify::Array($this->actual)->containsOnly($type, $isNativeType, $message);

        return $this;
    }

    public function arrayContainsOnlyInstancesOf($className, string $message = ''): self
    {
        Verify::Array($this->actual)->containsOnlyInstancesOf($className, $message);

        return $this;
    }

    public function arrayCount($expectedCount, string $message = ''): self
    {
        Verify::Array($this->actual)->count($expectedCount, $message);

        return $this;
    }

    public function arrayHasKey($key, string $message = ''): self
    {
        Verify::Array($this->actual)->hasKey($key, $message);

        return $this;
    }

    public function arrayHasNotKey($key, string $message = ''): self
    {
        Verify::Array($this->actual)->hasNotKey($key, $message);

        return $this;
    }

    public function arrayNotContains($needle, string $message = ''): self
    {
        Verify::Array($this->actual)->notContains($needle, $message);

        return $this;
    }

    public function arrayNotContainsEquals($needle, string $message = ''): self
    {
        Verify::Array($this->actual)->notContainsEquals($needle, $message);

        return $this;
    }

    public function arrayNotContainsOnly($type, $isNativeType = null, string $message = ''): self
    {
        Verify::Array($this->actual)->notContainsOnly($type, $isNativeType, $message);

        return $this;
    }

    public function arrayNotCount($expectedCount, string $message = ''): self
    {
        Verify::Array($this->actual)->notCount($expectedCount, $message);

        return $this;
    }

    public function arrayNotSameSize($expected, string $message = ''): self
    {
        Verify::Array($this->actual)->notSameSize($expected, $message);

        return $this;
    }

    public function arraySameSize($expected, string $message = ''): self
    {
        Verify::Array($this->actual)->sameSize($expected, $message);

        return $this;
    }

    public function baseObjectHasAttribute($attributeName, string $message = ''): self
    {
        Verify::BaseObject($this->actual)->hasAttribute($attributeName, $message);

        return $this;
    }

    public function baseObjectNotHasAttribute($attributeName, string $message = ''): self
    {
        Verify::BaseObject($this->actual)->notHasAttribute($attributeName, $message);

        return $this;
    }

    public function callableDoesNotThrow($throws = null, string $message = ''): self
    {
        Verify::Callable($this->actual)->doesNotThrow($throws, $message);

        return $this;
    }

    public function callableThrows($throws = null, string $message = ''): self
    {
        Verify::Callable($this->actual)->throws($throws, $message);

        return $this;
    }

    public function classHasAttribute($attributeName, string $message = ''): self
    {
        Verify::class($this->actual)->hasAttribute($attributeName, $message);

        return $this;
    }

    public function classHasStaticAttribute($attributeName, string $message = ''): self
    {
        Verify::class($this->actual)->hasStaticAttribute($attributeName, $message);

        return $this;
    }

    public function classNotHasAttribute($attributeName, string $message = ''): self
    {
        Verify::class($this->actual)->notHasAttribute($attributeName, $message);

        return $this;
    }

    public function classNotHasStaticAttribute($attributeName, string $message = ''): self
    {
        Verify::class($this->actual)->notHasStaticAttribute($attributeName, $message);

        return $this;
    }

    public function directoryDoesNotExist(string $message = ''): self
    {
        Verify::Directory($this->actual)->doesNotExist($message);

        return $this;
    }

    public function directoryExists(string $message = ''): self
    {
        Verify::Directory($this->actual)->exists($message);

        return $this;
    }

    public function directoryIsNotReadable(string $message = ''): self
    {
        Verify::Directory($this->actual)->isNotReadable($message);

        return $this;
    }

    public function directoryIsNotWritable(string $message = ''): self
    {
        Verify::Directory($this->actual)->isNotWritable($message);

        return $this;
    }

    public function directoryIsReadable(string $message = ''): self
    {
        Verify::Directory($this->actual)->isReadable($message);

        return $this;
    }

    public function directoryIsWritable(string $message = ''): self
    {
        Verify::Directory($this->actual)->isWritable($message);

        return $this;
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
        Assert::assertEmpty($this->actual, $message);

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
        Assert::assertEquals($expected, $this->actual, $message);

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
        Assert::assertEqualsCanonicalizing($expected, $this->actual, $message);

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
        Assert::assertEqualsIgnoringCase($expected, $this->actual, $message);

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
        Assert::assertEqualsWithDelta($expected, $this->actual, $delta, $message);

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
        Assert::assertFalse($this->actual, $message);

        return $this;
    }

    public function fileDoesNotExists(string $message = ''): self
    {
        Verify::File($this->actual)->doesNotExists($message);

        return $this;
    }

    public function fileEquals($expected, string $message = ''): self
    {
        Verify::File($this->actual)->equals($expected, $message);

        return $this;
    }

    public function fileEqualsCanonicalizing($expected, string $message = ''): self
    {
        Verify::File($this->actual)->equalsCanonicalizing($expected, $message);

        return $this;
    }

    public function fileEqualsIgnoringCase($expected, string $message = ''): self
    {
        Verify::File($this->actual)->equalsIgnoringCase($expected, $message);

        return $this;
    }

    public function fileExists(string $message = ''): self
    {
        Verify::File($this->actual)->exists($message);

        return $this;
    }

    public function fileIsNotReadable(string $message = ''): self
    {
        Verify::File($this->actual)->isNotReadable($message);

        return $this;
    }

    public function fileIsNotWritable(string $message = ''): self
    {
        Verify::File($this->actual)->isNotWritable($message);

        return $this;
    }

    public function fileIsReadable(string $message = ''): self
    {
        Verify::File($this->actual)->isReadable($message);

        return $this;
    }

    public function fileIsWritable(string $message = ''): self
    {
        Verify::File($this->actual)->isWritable($message);

        return $this;
    }

    public function fileNotEquals($expected, string $message = ''): self
    {
        Verify::File($this->actual)->notEquals($expected, $message);

        return $this;
    }

    public function fileNotEqualsCanonicalizing($expected, string $message = ''): self
    {
        Verify::File($this->actual)->notEqualsCanonicalizing($expected, $message);

        return $this;
    }

    public function fileNotEqualsIgnoringCase($expected, string $message = ''): self
    {
        Verify::File($this->actual)->notEqualsIgnoringCase($expected, $message);

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
        Assert::assertFinite($this->actual, $message);

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
        Assert::assertGreaterThan($expected, $this->actual, $message);

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
        Assert::assertGreaterThanOrEqual($expected, $this->actual, $message);

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
        Assert::assertInfinite($this->actual, $message);

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
        Assert::assertInstanceOf($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is of type array.
     *
     * @param string $message
     *
     * @return self
     */
    public function isArray(string $message = ''): self
    {
        Assert::assertIsArray($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is of type bool.
     *
     * @param string $message
     *
     * @return self
     */
    public function isBool(string $message = ''): self
    {
        Assert::assertIsBool($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is of type callable.
     *
     * @param string $message
     *
     * @return self
     */
    public function isCallable(string $message = ''): self
    {
        Assert::assertIsCallable($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is of type resource and is closed.
     *
     * @param string $message
     *
     * @return self
     */
    public function isClosedResource(string $message = ''): self
    {
        Assert::assertIsClosedResource($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is of type float.
     *
     * @param string $message
     *
     * @return self
     */
    public function isFloat(string $message = ''): self
    {
        Assert::assertIsFloat($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is of type int.
     *
     * @param string $message
     *
     * @return self
     */
    public function isInt(string $message = ''): self
    {
        Assert::assertIsInt($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is of type iterable.
     *
     * @param string $message
     *
     * @return self
     */
    public function isIterable(string $message = ''): self
    {
        Assert::assertIsIterable($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is not of type array.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotArray(string $message = ''): self
    {
        Assert::assertIsNotArray($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is not of type bool.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotBool(string $message = ''): self
    {
        Assert::assertIsNotBool($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is not of type callable.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotCallable(string $message = ''): self
    {
        Assert::assertIsNotCallable($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is not of type resource.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotClosedResource(string $message = ''): self
    {
        Assert::assertIsNotClosedResource($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is not of type float.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotFloat(string $message = ''): self
    {
        Assert::assertIsNotFloat($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is not of type int.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotInt(string $message = ''): self
    {
        Assert::assertIsNotInt($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is not of type iterable.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotIterable(string $message = ''): self
    {
        Assert::assertIsNotIterable($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is not of type numeric.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotNumeric(string $message = ''): self
    {
        Assert::assertIsNotNumeric($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is not of type object.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotObject(string $message = ''): self
    {
        Assert::assertIsNotObject($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is not of type resource.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotResource(string $message = ''): self
    {
        Assert::assertIsNotResource($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is not of type scalar.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotScalar(string $message = ''): self
    {
        Assert::assertIsNotScalar($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is not of type string.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotString(string $message = ''): self
    {
        Assert::assertIsNotString($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is of type numeric.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNumeric(string $message = ''): self
    {
        Assert::assertIsNumeric($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is of type object.
     *
     * @param string $message
     *
     * @return self
     */
    public function isObject(string $message = ''): self
    {
        Assert::assertIsObject($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is of type resource.
     *
     * @param string $message
     *
     * @return self
     */
    public function isResource(string $message = ''): self
    {
        Assert::assertIsResource($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is of type scalar.
     *
     * @param string $message
     *
     * @return self
     */
    public function isScalar(string $message = ''): self
    {
        Assert::assertIsScalar($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is of type string.
     *
     * @param string $message
     *
     * @return self
     */
    public function isString(string $message = ''): self
    {
        Assert::assertIsString($this->actual, $message);

        return $this;
    }

    public function jsonFileEqualsJsonFile($expectedFile, string $message = ''): self
    {
        Verify::JsonFile($this->actual)->equalsJsonFile($expectedFile, $message);

        return $this;
    }

    public function jsonFileNotEqualsJsonFile($expectedFile, string $message = ''): self
    {
        Verify::JsonFile($this->actual)->notEqualsJsonFile($expectedFile, $message);

        return $this;
    }

    public function jsonStringEqualsJsonFile($expectedFile, string $message = ''): self
    {
        Verify::JsonString($this->actual)->equalsJsonFile($expectedFile, $message);

        return $this;
    }

    public function jsonStringEqualsJsonString($expectedJson, string $message = ''): self
    {
        Verify::JsonString($this->actual)->equalsJsonString($expectedJson, $message);

        return $this;
    }

    public function jsonStringNotEqualsJsonFile($expectedFile, string $message = ''): self
    {
        Verify::JsonString($this->actual)->notEqualsJsonFile($expectedFile, $message);

        return $this;
    }

    public function jsonStringNotEqualsJsonString($expectedJson, string $message = ''): self
    {
        Verify::JsonString($this->actual)->notEqualsJsonString($expectedJson, $message);

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
        Assert::assertLessThan($expected, $this->actual, $message);

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
        Assert::assertLessThanOrEqual($expected, $this->actual, $message);

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
        Assert::assertNan($this->actual, $message);

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
        Assert::assertNotEmpty($this->actual, $message);

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
        Assert::assertNotEquals($expected, $this->actual, $message);

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
        Assert::assertNotEqualsCanonicalizing($expected, $this->actual, $message);

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
        Assert::assertNotEqualsIgnoringCase($expected, $this->actual, $message);

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
        Assert::assertNotEqualsWithDelta($expected, $this->actual, $delta, $message);

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
        Assert::assertNotFalse($this->actual, $message);

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
        Assert::assertNotInstanceOf($expected, $this->actual, $message);

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
        Assert::assertNotNull($this->actual, $message);

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
        Assert::assertNotSame($expected, $this->actual, $message);

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
        Assert::assertNotTrue($this->actual, $message);

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
        Assert::assertNull($this->actual, $message);

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
        Assert::assertSame($expected, $this->actual, $message);

        return $this;
    }

    public function stringContainsString($needle, string $message = ''): self
    {
        Verify::String($this->actual)->containsString($needle, $message);

        return $this;
    }

    public function stringContainsStringIgnoringCase($needle, string $message = ''): self
    {
        Verify::String($this->actual)->containsStringIgnoringCase($needle, $message);

        return $this;
    }

    public function stringDoesNotMatchRegExp($pattern, string $message = ''): self
    {
        Verify::String($this->actual)->doesNotMatchRegExp($pattern, $message);

        return $this;
    }

    public function stringEndsWith($suffix, string $message = ''): self
    {
        Verify::String($this->actual)->endsWith($suffix, $message);

        return $this;
    }

    public function stringEqualsFile($expectedFile, string $message = ''): self
    {
        Verify::String($this->actual)->equalsFile($expectedFile, $message);

        return $this;
    }

    public function stringEqualsFileCanonicalizing($expectedFile, string $message = ''): self
    {
        Verify::String($this->actual)->equalsFileCanonicalizing($expectedFile, $message);

        return $this;
    }

    public function stringEqualsFileIgnoringCase($expectedFile, string $message = ''): self
    {
        Verify::String($this->actual)->equalsFileIgnoringCase($expectedFile, $message);

        return $this;
    }

    public function stringJson(string $message = ''): self
    {
        Verify::String($this->actual)->json($message);

        return $this;
    }

    public function stringMatchesFormat($format, string $message = ''): self
    {
        Verify::String($this->actual)->matchesFormat($format, $message);

        return $this;
    }

    public function stringMatchesFormatFile($formatFile, string $message = ''): self
    {
        Verify::String($this->actual)->matchesFormatFile($formatFile, $message);

        return $this;
    }

    public function stringMatchesRegExp($pattern, string $message = ''): self
    {
        Verify::String($this->actual)->matchesRegExp($pattern, $message);

        return $this;
    }

    public function stringNotContainsString($needle, string $message = ''): self
    {
        Verify::String($this->actual)->notContainsString($needle, $message);

        return $this;
    }

    public function stringNotContainsStringIgnoringCase($needle, string $message = ''): self
    {
        Verify::String($this->actual)->notContainsStringIgnoringCase($needle, $message);

        return $this;
    }

    public function stringNotEndsWith($suffix, string $message = ''): self
    {
        Verify::String($this->actual)->notEndsWith($suffix, $message);

        return $this;
    }

    public function stringNotEqualsFile($expectedFile, string $message = ''): self
    {
        Verify::String($this->actual)->notEqualsFile($expectedFile, $message);

        return $this;
    }

    public function stringNotEqualsFileCanonicalizing($expectedFile, string $message = ''): self
    {
        Verify::String($this->actual)->notEqualsFileCanonicalizing($expectedFile, $message);

        return $this;
    }

    public function stringNotEqualsFileIgnoringCase($expectedFile, string $message = ''): self
    {
        Verify::String($this->actual)->notEqualsFileIgnoringCase($expectedFile, $message);

        return $this;
    }

    public function stringNotMatchesFormat($format, string $message = ''): self
    {
        Verify::String($this->actual)->notMatchesFormat($format, $message);

        return $this;
    }

    public function stringNotMatchesFormatFile($formatFile, string $message = ''): self
    {
        Verify::String($this->actual)->notMatchesFormatFile($formatFile, $message);

        return $this;
    }

    public function stringStartsNotWith($prefix, string $message = ''): self
    {
        Verify::String($this->actual)->startsNotWith($prefix, $message);

        return $this;
    }

    public function stringStartsWith($prefix, string $message = ''): self
    {
        Verify::String($this->actual)->startsWith($prefix, $message);

        return $this;
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
        Assert::assertTrue($this->actual, $message);

        return $this;
    }

    public function xmlFileEqualsXmlFile($expectedFile, string $message = ''): self
    {
        Verify::XmlFile($this->actual)->equalsXmlFile($expectedFile, $message);

        return $this;
    }

    public function xmlFileNotEqualsXmlFile($expectedFile, string $message = ''): self
    {
        Verify::XmlFile($this->actual)->notEqualsXmlFile($expectedFile, $message);

        return $this;
    }

    public function xmlStringEqualsXmlFile($expectedFile, string $message = ''): self
    {
        Verify::XmlString($this->actual)->equalsXmlFile($expectedFile, $message);

        return $this;
    }

    public function xmlStringEqualsXmlString($expectedXml, string $message = ''): self
    {
        Verify::XmlString($this->actual)->equalsXmlString($expectedXml, $message);

        return $this;
    }

    public function xmlStringNotEqualsXmlFile($expectedFile, string $message = ''): self
    {
        Verify::XmlString($this->actual)->notEqualsXmlFile($expectedFile, $message);

        return $this;
    }

    public function xmlStringNotEqualsXmlString($expectedXml, string $message = ''): self
    {
        Verify::XmlString($this->actual)->notEqualsXmlString($expectedXml, $message);

        return $this;
    }
}
