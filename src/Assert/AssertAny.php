<?php

namespace Realodix\NextProject\Assert;

use PHPUnit\Framework\Assert as PHPUnit;
use Realodix\NextProject\Assert;

class AssertAny extends Assert
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
        Assert::Array($this->actual)->contains($needle, $message);

        return $this;
    }

    public function arrayContainsEquals($needle, string $message = ''): self
    {
        Assert::Array($this->actual)->containsEquals($needle, $message);

        return $this;
    }

    public function arrayContainsOnly($type, $isNativeType = null, string $message = ''): self
    {
        Assert::Array($this->actual)->containsOnly($type, $isNativeType, $message);

        return $this;
    }

    public function arrayContainsOnlyInstancesOf($className, string $message = ''): self
    {
        Assert::Array($this->actual)->containsOnlyInstancesOf($className, $message);

        return $this;
    }

    public function arrayCount($expectedCount, string $message = ''): self
    {
        Assert::Array($this->actual)->count($expectedCount, $message);

        return $this;
    }

    public function arrayHasKey($key, string $message = ''): self
    {
        Assert::Array($this->actual)->hasKey($key, $message);

        return $this;
    }

    public function arrayHasNotKey($key, string $message = ''): self
    {
        Assert::Array($this->actual)->hasNotKey($key, $message);

        return $this;
    }

    public function arrayNotContains($needle, string $message = ''): self
    {
        Assert::Array($this->actual)->notContains($needle, $message);

        return $this;
    }

    public function arrayNotContainsEquals($needle, string $message = ''): self
    {
        Assert::Array($this->actual)->notContainsEquals($needle, $message);

        return $this;
    }

    public function arrayNotContainsOnly($type, $isNativeType = null, string $message = ''): self
    {
        Assert::Array($this->actual)->notContainsOnly($type, $isNativeType, $message);

        return $this;
    }

    public function arrayNotCount($expectedCount, string $message = ''): self
    {
        Assert::Array($this->actual)->notCount($expectedCount, $message);

        return $this;
    }

    public function arrayNotSameSize($expected, string $message = ''): self
    {
        Assert::Array($this->actual)->notSameSize($expected, $message);

        return $this;
    }

    public function arraySameSize($expected, string $message = ''): self
    {
        Assert::Array($this->actual)->sameSize($expected, $message);

        return $this;
    }

    public function baseObjectHasAttribute($attributeName, string $message = ''): self
    {
        Assert::BaseObject($this->actual)->hasAttribute($attributeName, $message);

        return $this;
    }

    public function baseObjectNotHasAttribute($attributeName, string $message = ''): self
    {
        Assert::BaseObject($this->actual)->notHasAttribute($attributeName, $message);

        return $this;
    }

    public function callableDoesNotThrow($throws = null, string $message = ''): self
    {
        Assert::Callable($this->actual)->doesNotThrow($throws, $message);

        return $this;
    }

    public function callableThrows($throws = null, string $message = ''): self
    {
        Assert::Callable($this->actual)->throws($throws, $message);

        return $this;
    }

    public function classHasAttribute($attributeName, string $message = ''): self
    {
        Assert::class($this->actual)->hasAttribute($attributeName, $message);

        return $this;
    }

    public function classHasStaticAttribute($attributeName, string $message = ''): self
    {
        Assert::class($this->actual)->hasStaticAttribute($attributeName, $message);

        return $this;
    }

    public function classNotHasAttribute($attributeName, string $message = ''): self
    {
        Assert::class($this->actual)->notHasAttribute($attributeName, $message);

        return $this;
    }

    public function classNotHasStaticAttribute($attributeName, string $message = ''): self
    {
        Assert::class($this->actual)->notHasStaticAttribute($attributeName, $message);

        return $this;
    }

    public function directoryDoesNotExist(string $message = ''): self
    {
        Assert::Directory($this->actual)->doesNotExist($message);

        return $this;
    }

    public function directoryExists(string $message = ''): self
    {
        Assert::Directory($this->actual)->exists($message);

        return $this;
    }

    public function directoryIsNotReadable(string $message = ''): self
    {
        Assert::Directory($this->actual)->isNotReadable($message);

        return $this;
    }

    public function directoryIsNotWritable(string $message = ''): self
    {
        Assert::Directory($this->actual)->isNotWritable($message);

        return $this;
    }

    public function directoryIsReadable(string $message = ''): self
    {
        Assert::Directory($this->actual)->isReadable($message);

        return $this;
    }

    public function directoryIsWritable(string $message = ''): self
    {
        Assert::Directory($this->actual)->isWritable($message);

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

    public function fileDoesNotExists(string $message = ''): self
    {
        Assert::File($this->actual)->doesNotExists($message);

        return $this;
    }

    public function fileEquals($expected, string $message = ''): self
    {
        Assert::File($this->actual)->equals($expected, $message);

        return $this;
    }

    public function fileEqualsCanonicalizing($expected, string $message = ''): self
    {
        Assert::File($this->actual)->equalsCanonicalizing($expected, $message);

        return $this;
    }

    public function fileEqualsIgnoringCase($expected, string $message = ''): self
    {
        Assert::File($this->actual)->equalsIgnoringCase($expected, $message);

        return $this;
    }

    public function fileExists(string $message = ''): self
    {
        Assert::File($this->actual)->exists($message);

        return $this;
    }

    public function fileIsNotReadable(string $message = ''): self
    {
        Assert::File($this->actual)->isNotReadable($message);

        return $this;
    }

    public function fileIsNotWritable(string $message = ''): self
    {
        Assert::File($this->actual)->isNotWritable($message);

        return $this;
    }

    public function fileIsReadable(string $message = ''): self
    {
        Assert::File($this->actual)->isReadable($message);

        return $this;
    }

    public function fileIsWritable(string $message = ''): self
    {
        Assert::File($this->actual)->isWritable($message);

        return $this;
    }

    public function fileNotEquals($expected, string $message = ''): self
    {
        Assert::File($this->actual)->notEquals($expected, $message);

        return $this;
    }

    public function fileNotEqualsCanonicalizing($expected, string $message = ''): self
    {
        Assert::File($this->actual)->notEqualsCanonicalizing($expected, $message);

        return $this;
    }

    public function fileNotEqualsIgnoringCase($expected, string $message = ''): self
    {
        Assert::File($this->actual)->notEqualsIgnoringCase($expected, $message);

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
     * Verifies that a variable is of type array.
     *
     * @param string $message
     *
     * @return self
     */
    public function isArray(string $message = ''): self
    {
        PHPUnit::assertIsArray($this->actual, $message);

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
        PHPUnit::assertIsBool($this->actual, $message);

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
        PHPUnit::assertIsCallable($this->actual, $message);

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
        PHPUnit::assertIsClosedResource($this->actual, $message);

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
        PHPUnit::assertIsFloat($this->actual, $message);

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
        PHPUnit::assertIsInt($this->actual, $message);

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
        PHPUnit::assertIsIterable($this->actual, $message);

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
        PHPUnit::assertIsNotArray($this->actual, $message);

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
        PHPUnit::assertIsNotBool($this->actual, $message);

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
        PHPUnit::assertIsNotCallable($this->actual, $message);

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
        PHPUnit::assertIsNotClosedResource($this->actual, $message);

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
        PHPUnit::assertIsNotFloat($this->actual, $message);

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
        PHPUnit::assertIsNotInt($this->actual, $message);

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
        PHPUnit::assertIsNotIterable($this->actual, $message);

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
        PHPUnit::assertIsNotNumeric($this->actual, $message);

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
        PHPUnit::assertIsNotObject($this->actual, $message);

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
        PHPUnit::assertIsNotResource($this->actual, $message);

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
        PHPUnit::assertIsNotScalar($this->actual, $message);

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
        PHPUnit::assertIsNotString($this->actual, $message);

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
        PHPUnit::assertIsNumeric($this->actual, $message);

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
        PHPUnit::assertIsObject($this->actual, $message);

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
        PHPUnit::assertIsResource($this->actual, $message);

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
        PHPUnit::assertIsScalar($this->actual, $message);

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
        PHPUnit::assertIsString($this->actual, $message);

        return $this;
    }

    public function jsonFileEqualsJsonFile($expectedFile, string $message = ''): self
    {
        Assert::JsonFile($this->actual)->equalsJsonFile($expectedFile, $message);

        return $this;
    }

    public function jsonFileNotEqualsJsonFile($expectedFile, string $message = ''): self
    {
        Assert::JsonFile($this->actual)->notEqualsJsonFile($expectedFile, $message);

        return $this;
    }

    public function jsonStringEqualsJsonFile($expectedFile, string $message = ''): self
    {
        Assert::JsonString($this->actual)->equalsJsonFile($expectedFile, $message);

        return $this;
    }

    public function jsonStringEqualsJsonString($expectedJson, string $message = ''): self
    {
        Assert::JsonString($this->actual)->equalsJsonString($expectedJson, $message);

        return $this;
    }

    public function jsonStringNotEqualsJsonFile($expectedFile, string $message = ''): self
    {
        Assert::JsonString($this->actual)->notEqualsJsonFile($expectedFile, $message);

        return $this;
    }

    public function jsonStringNotEqualsJsonString($expectedJson, string $message = ''): self
    {
        Assert::JsonString($this->actual)->notEqualsJsonString($expectedJson, $message);

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

    public function stringContainsString($needle, string $message = ''): self
    {
        Assert::String($this->actual)->containsString($needle, $message);

        return $this;
    }

    public function stringContainsStringIgnoringCase($needle, string $message = ''): self
    {
        Assert::String($this->actual)->containsStringIgnoringCase($needle, $message);

        return $this;
    }

    public function stringDoesNotMatchRegExp($pattern, string $message = ''): self
    {
        Assert::String($this->actual)->doesNotMatchRegExp($pattern, $message);

        return $this;
    }

    public function stringEndsWith($suffix, string $message = ''): self
    {
        Assert::String($this->actual)->endsWith($suffix, $message);

        return $this;
    }

    public function stringEqualsFile($expectedFile, string $message = ''): self
    {
        Assert::String($this->actual)->equalsFile($expectedFile, $message);

        return $this;
    }

    public function stringEqualsFileCanonicalizing($expectedFile, string $message = ''): self
    {
        Assert::String($this->actual)->equalsFileCanonicalizing($expectedFile, $message);

        return $this;
    }

    public function stringEqualsFileIgnoringCase($expectedFile, string $message = ''): self
    {
        Assert::String($this->actual)->equalsFileIgnoringCase($expectedFile, $message);

        return $this;
    }

    public function stringJson(string $message = ''): self
    {
        Assert::String($this->actual)->json($message);

        return $this;
    }

    public function stringMatchesFormat($format, string $message = ''): self
    {
        Assert::String($this->actual)->matchesFormat($format, $message);

        return $this;
    }

    public function stringMatchesFormatFile($formatFile, string $message = ''): self
    {
        Assert::String($this->actual)->matchesFormatFile($formatFile, $message);

        return $this;
    }

    public function stringMatchesRegExp($pattern, string $message = ''): self
    {
        Assert::String($this->actual)->matchesRegExp($pattern, $message);

        return $this;
    }

    public function stringNotContainsString($needle, string $message = ''): self
    {
        Assert::String($this->actual)->notContainsString($needle, $message);

        return $this;
    }

    public function stringNotContainsStringIgnoringCase($needle, string $message = ''): self
    {
        Assert::String($this->actual)->notContainsStringIgnoringCase($needle, $message);

        return $this;
    }

    public function stringNotEndsWith($suffix, string $message = ''): self
    {
        Assert::String($this->actual)->notEndsWith($suffix, $message);

        return $this;
    }

    public function stringNotEqualsFile($expectedFile, string $message = ''): self
    {
        Assert::String($this->actual)->notEqualsFile($expectedFile, $message);

        return $this;
    }

    public function stringNotEqualsFileCanonicalizing($expectedFile, string $message = ''): self
    {
        Assert::String($this->actual)->notEqualsFileCanonicalizing($expectedFile, $message);

        return $this;
    }

    public function stringNotEqualsFileIgnoringCase($expectedFile, string $message = ''): self
    {
        Assert::String($this->actual)->notEqualsFileIgnoringCase($expectedFile, $message);

        return $this;
    }

    public function stringNotMatchesFormat($format, string $message = ''): self
    {
        Assert::String($this->actual)->notMatchesFormat($format, $message);

        return $this;
    }

    public function stringNotMatchesFormatFile($formatFile, string $message = ''): self
    {
        Assert::String($this->actual)->notMatchesFormatFile($formatFile, $message);

        return $this;
    }

    public function stringStartsNotWith($prefix, string $message = ''): self
    {
        Assert::String($this->actual)->startsNotWith($prefix, $message);

        return $this;
    }

    public function stringStartsWith($prefix, string $message = ''): self
    {
        Assert::String($this->actual)->startsWith($prefix, $message);

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
        PHPUnit::assertTrue($this->actual, $message);

        return $this;
    }

    public function xmlFileEqualsXmlFile($expectedFile, string $message = ''): self
    {
        Assert::XmlFile($this->actual)->equalsXmlFile($expectedFile, $message);

        return $this;
    }

    public function xmlFileNotEqualsXmlFile($expectedFile, string $message = ''): self
    {
        Assert::XmlFile($this->actual)->notEqualsXmlFile($expectedFile, $message);

        return $this;
    }

    public function xmlStringEqualsXmlFile($expectedFile, string $message = ''): self
    {
        Assert::XmlString($this->actual)->equalsXmlFile($expectedFile, $message);

        return $this;
    }

    public function xmlStringEqualsXmlString($expectedXml, string $message = ''): self
    {
        Assert::XmlString($this->actual)->equalsXmlString($expectedXml, $message);

        return $this;
    }

    public function xmlStringNotEqualsXmlFile($expectedFile, string $message = ''): self
    {
        Assert::XmlString($this->actual)->notEqualsXmlFile($expectedFile, $message);

        return $this;
    }

    public function xmlStringNotEqualsXmlString($expectedXml, string $message = ''): self
    {
        Assert::XmlString($this->actual)->notEqualsXmlString($expectedXml, $message);

        return $this;
    }
}