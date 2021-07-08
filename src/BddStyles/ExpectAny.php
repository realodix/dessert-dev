<?php

namespace Realodix\NextProject\BddStyles;

use PHPUnit\Framework\Assert as PHPUnit;
use Realodix\NextProject\Expect;

class ExpectAny extends Expect
{
    /**
     * @param mixed $actual
     */
    public function __construct($actual)
    {
        parent::__construct($actual);
    }

    public function arrayNotToContain($needle, string $message = ''): self
    {
        Expect::Array($this->actual)->notToContain($needle, $message);

        return $this;
    }

    public function arrayNotToContainEqual($needle, string $message = ''): self
    {
        Expect::Array($this->actual)->notToContainEqual($needle, $message);

        return $this;
    }

    public function arrayNotToContainOnly($type, $isNativeType = null, string $message = ''): self
    {
        Expect::Array($this->actual)->notToContainOnly($type, $isNativeType, $message);

        return $this;
    }

    public function arrayNotToHaveCount($expectedCount, string $message = ''): self
    {
        Expect::Array($this->actual)->notToHaveCount($expectedCount, $message);

        return $this;
    }

    public function arrayNotToHaveKey($key, string $message = ''): self
    {
        Expect::Array($this->actual)->notToHaveKey($key, $message);

        return $this;
    }

    public function arrayNotToHaveSameSizeAs($expected, string $message = ''): self
    {
        Expect::Array($this->actual)->notToHaveSameSizeAs($expected, $message);

        return $this;
    }

    public function arrayToContain($needle, string $message = ''): self
    {
        Expect::Array($this->actual)->toContain($needle, $message);

        return $this;
    }

    public function arrayToContainEqual($needle, string $message = ''): self
    {
        Expect::Array($this->actual)->toContainEqual($needle, $message);

        return $this;
    }

    public function arrayToContainOnly($type, $isNativeType = null, string $message = ''): self
    {
        Expect::Array($this->actual)->toContainOnly($type, $isNativeType, $message);

        return $this;
    }

    public function arrayToContainOnlyInstancesOf($className, string $message = ''): self
    {
        Expect::Array($this->actual)->toContainOnlyInstancesOf($className, $message);

        return $this;
    }

    public function arrayToHaveCount($expectedCount, string $message = ''): self
    {
        Expect::Array($this->actual)->toHaveCount($expectedCount, $message);

        return $this;
    }

    public function arrayToHaveKey($key, string $message = ''): self
    {
        Expect::Array($this->actual)->toHaveKey($key, $message);

        return $this;
    }

    public function arrayToHaveSameSizeAs($expected, string $message = ''): self
    {
        Expect::Array($this->actual)->toHaveSameSizeAs($expected, $message);

        return $this;
    }

    public function baseObjectNotToHaveAttribute($attributeName, string $message = ''): self
    {
        Expect::BaseObject($this->actual)->notToHaveAttribute($attributeName, $message);

        return $this;
    }

    public function baseObjectToHaveAttribute($attributeName, string $message = ''): self
    {
        Expect::BaseObject($this->actual)->toHaveAttribute($attributeName, $message);

        return $this;
    }

    public function callableNotToThrow($throws = null, string $message = ''): self
    {
        Expect::Callable($this->actual)->notToThrow($throws, $message);

        return $this;
    }

    public function callableToThrow($throws = null, string $message = ''): self
    {
        Expect::Callable($this->actual)->toThrow($throws, $message);

        return $this;
    }

    public function classNotToHaveAttribute($attributeName, string $message = ''): self
    {
        Expect::class($this->actual)->notToHaveAttribute($attributeName, $message);

        return $this;
    }

    public function classNotToHaveStaticAttribute($attributeName, string $message = ''): self
    {
        Expect::class($this->actual)->notToHaveStaticAttribute($attributeName, $message);

        return $this;
    }

    public function classToHaveAttribute($attributeName, string $message = ''): self
    {
        Expect::class($this->actual)->toHaveAttribute($attributeName, $message);

        return $this;
    }

    public function classToHaveStaticAttribute($attributeName, string $message = ''): self
    {
        Expect::class($this->actual)->toHaveStaticAttribute($attributeName, $message);

        return $this;
    }

    public function directoryNotToBeReadable(string $message = ''): self
    {
        Expect::Directory($this->actual)->notToBeReadable($message);

        return $this;
    }

    public function directoryNotToBeWritable(string $message = ''): self
    {
        Expect::Directory($this->actual)->notToBeWritable($message);

        return $this;
    }

    public function directoryNotToExist(string $message = ''): self
    {
        Expect::Directory($this->actual)->notToExist($message);

        return $this;
    }

    public function directoryToBeReadable(string $message = ''): self
    {
        Expect::Directory($this->actual)->toBeReadable($message);

        return $this;
    }

    public function directoryToBeWritable(string $message = ''): self
    {
        Expect::Directory($this->actual)->toBeWritable($message);

        return $this;
    }

    public function directoryToExist(string $message = ''): self
    {
        Expect::Directory($this->actual)->toExist($message);

        return $this;
    }

    public function fileNotToBeReadable(string $message = ''): self
    {
        Expect::File($this->actual)->notToBeReadable($message);

        return $this;
    }

    public function fileNotToBeWritable(string $message = ''): self
    {
        Expect::File($this->actual)->notToBeWritable($message);

        return $this;
    }

    public function fileNotToExist(string $message = ''): self
    {
        Expect::File($this->actual)->notToExist($message);

        return $this;
    }

    public function fileToBeEqual($expected, string $message = ''): self
    {
        Expect::File($this->actual)->toBeEqual($expected, $message);

        return $this;
    }

    public function fileToBeEqualCanonicalizing($expected, string $message = ''): self
    {
        Expect::File($this->actual)->toBeEqualCanonicalizing($expected, $message);

        return $this;
    }

    public function fileToBeEqualIgnoringCase($expected, string $message = ''): self
    {
        Expect::File($this->actual)->toBeEqualIgnoringCase($expected, $message);

        return $this;
    }

    public function fileToBeReadable(string $message = ''): self
    {
        Expect::File($this->actual)->toBeReadable($message);

        return $this;
    }

    public function fileToBeWritable(string $message = ''): self
    {
        Expect::File($this->actual)->toBeWritable($message);

        return $this;
    }

    public function fileToExist(string $message = ''): self
    {
        Expect::File($this->actual)->toExist($message);

        return $this;
    }

    public function fileToNotEqual($expected, string $message = ''): self
    {
        Expect::File($this->actual)->toNotEqual($expected, $message);

        return $this;
    }

    public function fileToNotEqualCanonicalizing($expected, string $message = ''): self
    {
        Expect::File($this->actual)->toNotEqualCanonicalizing($expected, $message);

        return $this;
    }

    public function fileToNotEqualIgnoringCase($expected, string $message = ''): self
    {
        Expect::File($this->actual)->toNotEqualIgnoringCase($expected, $message);

        return $this;
    }

    public function jsonFileNotToEqualJsonFile($expectedFile, string $message = ''): self
    {
        Expect::JsonFile($this->actual)->notToEqualJsonFile($expectedFile, $message);

        return $this;
    }

    public function jsonFileToEqualJsonFile($expectedFile, string $message = ''): self
    {
        Expect::JsonFile($this->actual)->toEqualJsonFile($expectedFile, $message);

        return $this;
    }

    public function jsonStringNotToEqualJsonFile($expectedFile, string $message = ''): self
    {
        Expect::JsonString($this->actual)->notToEqualJsonFile($expectedFile, $message);

        return $this;
    }

    public function jsonStringNotToEqualJsonString($expectedJson, string $message = ''): self
    {
        Expect::JsonString($this->actual)->notToEqualJsonString($expectedJson, $message);

        return $this;
    }

    public function jsonStringToEqualJsonFile($expectedFile, string $message = ''): self
    {
        Expect::JsonString($this->actual)->toEqualJsonFile($expectedFile, $message);

        return $this;
    }

    public function jsonStringToEqualJsonString($expectedJson, string $message = ''): self
    {
        Expect::JsonString($this->actual)->toEqualJsonString($expectedJson, $message);

        return $this;
    }

    /**
     * Expect that two variables do not have the same type and value.
     *
     * @param mixed  $expected
     * @param string $message
     *
     * @return self
     */
    public function notToBe($expected, string $message = ''): self
    {
        PHPUnit::assertNotSame($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that a variable is not of type array.
     *
     * @param string $message
     *
     * @return self
     */
    public function notToBeArray(string $message = ''): self
    {
        PHPUnit::assertIsNotArray($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a variable is not of type bool.
     *
     * @param string $message
     *
     * @return self
     */
    public function notToBeBool(string $message = ''): self
    {
        PHPUnit::assertIsNotBool($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a variable is not of type callable.
     *
     * @param string $message
     *
     * @return self
     */
    public function notToBeCallable(string $message = ''): self
    {
        PHPUnit::assertIsNotCallable($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a variable is not of type resource.
     *
     * @param string $message
     *
     * @return self
     */
    public function notToBeClosedResource(string $message = ''): self
    {
        PHPUnit::assertIsNotClosedResource($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a variable is not empty.
     *
     * @param string $message
     *
     * @return self
     */
    public function notToBeEmpty(string $message = ''): self
    {
        PHPUnit::assertNotEmpty($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a condition is not false.
     *
     * @param string $message
     *
     * @return self
     */
    public function notToBeFalse(string $message = ''): self
    {
        PHPUnit::assertNotFalse($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a variable is not of type float.
     *
     * @param string $message
     *
     * @return self
     */
    public function notToBeFloat(string $message = ''): self
    {
        PHPUnit::assertIsNotFloat($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a variable is not of a given type.
     *
     * @param string $expected
     * @param string $message
     *
     * @return self
     */
    public function notToBeInstanceOf(string $expected, string $message = ''): self
    {
        PHPUnit::assertNotInstanceOf($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that a variable is not of type int.
     *
     * @param string $message
     *
     * @return self
     */
    public function notToBeInt(string $message = ''): self
    {
        PHPUnit::assertIsNotInt($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a variable is not of type iterable.
     *
     * @param string $message
     *
     * @return self
     */
    public function notToBeIterable(string $message = ''): self
    {
        PHPUnit::assertIsNotIterable($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a variable is not null.
     *
     * @param string $message
     *
     * @return self
     */
    public function notToBeNull(string $message = ''): self
    {
        PHPUnit::assertNotNull($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a variable is not of type numeric.
     *
     * @param string $message
     *
     * @return self
     */
    public function notToBeNumeric(string $message = ''): self
    {
        PHPUnit::assertIsNotNumeric($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a variable is not of type object.
     *
     * @param string $message
     *
     * @return self
     */
    public function notToBeObject(string $message = ''): self
    {
        PHPUnit::assertIsNotObject($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a variable is not of type resource.
     *
     * @param string $message
     *
     * @return self
     */
    public function notToBeResource(string $message = ''): self
    {
        PHPUnit::assertIsNotResource($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a variable is not of type scalar.
     *
     * @param string $message
     *
     * @return self
     */
    public function notToBeScalar(string $message = ''): self
    {
        PHPUnit::assertIsNotScalar($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a variable is not of type string.
     *
     * @param string $message
     *
     * @return self
     */
    public function notToBeString(string $message = ''): self
    {
        PHPUnit::assertIsNotString($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a condition is not true.
     *
     * @param string $message
     *
     * @return self
     */
    public function notToBeTrue(string $message = ''): self
    {
        PHPUnit::assertNotTrue($this->actual, $message);

        return $this;
    }

    /**
     * Expect that two variables are not equal.
     *
     * @param mixed  $expected
     * @param string $message
     *
     * @return self
     */
    public function notToEqual($expected, string $message = ''): self
    {
        PHPUnit::assertNotEquals($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that two variables are not equal (canonicalizing).
     *
     * @param mixed  $expected
     * @param string $message
     *
     * @return self
     */
    public function notToEqualCanonicalizing($expected, string $message = ''): self
    {
        PHPUnit::assertNotEqualsCanonicalizing($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that two variables are not equal (ignoring case).
     *
     * @param mixed  $expected
     * @param string $message
     *
     * @return self
     */
    public function notToEqualIgnoringCase($expected, string $message = ''): self
    {
        PHPUnit::assertNotEqualsIgnoringCase($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that two variables are not equal (with delta).
     *
     * @param mixed  $expected
     * @param float  $delta
     * @param string $message
     *
     * @return self
     */
    public function notToEqualWithDelta($expected, float $delta, string $message = ''): self
    {
        PHPUnit::assertNotEqualsWithDelta($expected, $this->actual, $delta, $message);

        return $this;
    }

    public function stringNotToContainString($needle, string $message = ''): self
    {
        Expect::String($this->actual)->notToContainString($needle, $message);

        return $this;
    }

    public function stringNotToContainStringIgnoringCase($needle, string $message = ''): self
    {
        Expect::String($this->actual)->notToContainStringIgnoringCase($needle, $message);

        return $this;
    }

    public function stringNotToEndWith($suffix, string $message = ''): self
    {
        Expect::String($this->actual)->notToEndWith($suffix, $message);

        return $this;
    }

    public function stringNotToEqualFile($expectedFile, string $message = ''): self
    {
        Expect::String($this->actual)->notToEqualFile($expectedFile, $message);

        return $this;
    }

    public function stringNotToEqualFileCanonicalizing($expectedFile, string $message = ''): self
    {
        Expect::String($this->actual)->notToEqualFileCanonicalizing($expectedFile, $message);

        return $this;
    }

    public function stringNotToEqualFileIgnoringCase($expectedFile, string $message = ''): self
    {
        Expect::String($this->actual)->notToEqualFileIgnoringCase($expectedFile, $message);

        return $this;
    }

    public function stringNotToMatchFormat($format, string $message = ''): self
    {
        Expect::String($this->actual)->notToMatchFormat($format, $message);

        return $this;
    }

    public function stringNotToMatchFormatFile($formatFile, string $message = ''): self
    {
        Expect::String($this->actual)->notToMatchFormatFile($formatFile, $message);

        return $this;
    }

    public function stringNotToMatchRegExp($pattern, string $message = ''): self
    {
        Expect::String($this->actual)->notToMatchRegExp($pattern, $message);

        return $this;
    }

    public function stringNotToStartWith($prefix, string $message = ''): self
    {
        Expect::String($this->actual)->notToStartWith($prefix, $message);

        return $this;
    }

    public function stringToBeJson(string $message = ''): self
    {
        Expect::String($this->actual)->toBeJson($message);

        return $this;
    }

    public function stringToContainString($needle, string $message = ''): self
    {
        Expect::String($this->actual)->toContainString($needle, $message);

        return $this;
    }

    public function stringToContainStringIgnoringCase($needle, string $message = ''): self
    {
        Expect::String($this->actual)->toContainStringIgnoringCase($needle, $message);

        return $this;
    }

    public function stringToEndWith($suffix, string $message = ''): self
    {
        Expect::String($this->actual)->toEndWith($suffix, $message);

        return $this;
    }

    public function stringToEqualFile($expectedFile, string $message = ''): self
    {
        Expect::String($this->actual)->toEqualFile($expectedFile, $message);

        return $this;
    }

    public function stringToEqualFileCanonicalizing($expectedFile, string $message = ''): self
    {
        Expect::String($this->actual)->toEqualFileCanonicalizing($expectedFile, $message);

        return $this;
    }

    public function stringToEqualFileIgnoringCase($expectedFile, string $message = ''): self
    {
        Expect::String($this->actual)->toEqualFileIgnoringCase($expectedFile, $message);

        return $this;
    }

    public function stringToMatchFormat($format, string $message = ''): self
    {
        Expect::String($this->actual)->toMatchFormat($format, $message);

        return $this;
    }

    public function stringToMatchFormatFile($formatFile, string $message = ''): self
    {
        Expect::String($this->actual)->toMatchFormatFile($formatFile, $message);

        return $this;
    }

    public function stringToMatchRegExp($pattern, string $message = ''): self
    {
        Expect::String($this->actual)->toMatchRegExp($pattern, $message);

        return $this;
    }

    public function stringToStartWith($prefix, string $message = ''): self
    {
        Expect::String($this->actual)->toStartWith($prefix, $message);

        return $this;
    }

    /**
     * Expect that two variables have the same type and value.
     *
     * @param mixed  $expected
     * @param string $message
     *
     * @return self
     */
    public function toBe($expected, string $message = ''): self
    {
        PHPUnit::assertSame($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that a variable is of type array.
     *
     * @param string $message
     *
     * @return self
     */
    public function toBeArray(string $message = ''): self
    {
        PHPUnit::assertIsArray($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a variable is of type bool.
     *
     * @param string $message
     *
     * @return self
     */
    public function toBeBool(string $message = ''): self
    {
        PHPUnit::assertIsBool($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a variable is of type callable.
     *
     * @param string $message
     *
     * @return self
     */
    public function toBeCallable(string $message = ''): self
    {
        PHPUnit::assertIsCallable($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a variable is of type resource and is closed.
     *
     * @param string $message
     *
     * @return self
     */
    public function toBeClosedResource(string $message = ''): self
    {
        PHPUnit::assertIsClosedResource($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a variable is empty.
     *
     * @param string $message
     *
     * @return self
     */
    public function toBeEmpty(string $message = ''): self
    {
        PHPUnit::assertEmpty($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a condition is false.
     *
     * @param string $message
     *
     * @return self
     */
    public function toBeFalse(string $message = ''): self
    {
        PHPUnit::assertFalse($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a variable is finite.
     *
     * @param string $message
     *
     * @return self
     */
    public function toBeFinite(string $message = ''): self
    {
        PHPUnit::assertFinite($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a variable is of type float.
     *
     * @param string $message
     *
     * @return self
     */
    public function toBeFloat(string $message = ''): self
    {
        PHPUnit::assertIsFloat($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a value is greater than another value.
     *
     * @param mixed  $expected
     * @param string $message
     *
     * @return self
     */
    public function toBeGreaterThan($expected, string $message = ''): self
    {
        PHPUnit::assertGreaterThan($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that a value is greater than or equal to another value.
     *
     * @param mixed  $expected
     * @param string $message
     *
     * @return self
     */
    public function toBeGreaterThanOrEqualTo($expected, string $message = ''): self
    {
        PHPUnit::assertGreaterThanOrEqual($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that a variable is infinite.
     *
     * @param string $message
     *
     * @return self
     */
    public function toBeInfinite(string $message = ''): self
    {
        PHPUnit::assertInfinite($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a variable is of a given type.
     *
     * @param string $expected
     * @param string $message
     *
     * @return self
     */
    public function toBeInstanceOf(string $expected, string $message = ''): self
    {
        PHPUnit::assertInstanceOf($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that a variable is of type int.
     *
     * @param string $message
     *
     * @return self
     */
    public function toBeInt(string $message = ''): self
    {
        PHPUnit::assertIsInt($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a variable is of type iterable.
     *
     * @param string $message
     *
     * @return self
     */
    public function toBeIterable(string $message = ''): self
    {
        PHPUnit::assertIsIterable($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a value is smaller than another value.
     *
     * @param mixed  $expected
     * @param string $message
     *
     * @return self
     */
    public function toBeLessThan($expected, string $message = ''): self
    {
        PHPUnit::assertLessThan($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that a value is smaller than or equal to another value.
     *
     * @param mixed  $expected
     * @param string $message
     *
     * @return self
     */
    public function toBeLessThanOrEqualTo($expected, string $message = ''): self
    {
        PHPUnit::assertLessThanOrEqual($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that a variable is nan.
     *
     * @param string $message
     *
     * @return self
     */
    public function toBeNan(string $message = ''): self
    {
        PHPUnit::assertNan($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a variable is null.
     *
     * @param string $message
     *
     * @return self
     */
    public function toBeNull(string $message = ''): self
    {
        PHPUnit::assertNull($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a variable is of type numeric.
     *
     * @param string $message
     *
     * @return self
     */
    public function toBeNumeric(string $message = ''): self
    {
        PHPUnit::assertIsNumeric($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a variable is of type object.
     *
     * @param string $message
     *
     * @return self
     */
    public function toBeObject(string $message = ''): self
    {
        PHPUnit::assertIsObject($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a variable is of type resource.
     *
     * @param string $message
     *
     * @return self
     */
    public function toBeResource(string $message = ''): self
    {
        PHPUnit::assertIsResource($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a variable is of type scalar.
     *
     * @param string $message
     *
     * @return self
     */
    public function toBeScalar(string $message = ''): self
    {
        PHPUnit::assertIsScalar($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a variable is of type string.
     *
     * @param string $message
     *
     * @return self
     */
    public function toBeString(string $message = ''): self
    {
        PHPUnit::assertIsString($this->actual, $message);

        return $this;
    }

    /**
     * Expect that a condition is true.
     *
     * @param string $message
     *
     * @return self
     */
    public function toBeTrue(string $message = ''): self
    {
        PHPUnit::assertTrue($this->actual, $message);

        return $this;
    }

    /**
     * Expect that two variables are equal.
     *
     * @param mixed  $expected
     * @param string $message
     *
     * @return self
     */
    public function toEqual($expected, string $message = ''): self
    {
        PHPUnit::assertEquals($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that two variables are equal (canonicalizing).
     *
     * @param mixed  $expected
     * @param string $message
     *
     * @return self
     */
    public function toEqualCanonicalizing($expected, string $message = ''): self
    {
        PHPUnit::assertEqualsCanonicalizing($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that two variables are equal (ignoring case).
     *
     * @param mixed  $expected
     * @param string $message
     *
     * @return self
     */
    public function toEqualIgnoringCase($expected, string $message = ''): self
    {
        PHPUnit::assertEqualsIgnoringCase($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that two variables are equal (with delta).
     *
     * @param mixed  $expected
     * @param float  $delta
     * @param string $message
     *
     * @return self
     */
    public function toEqualWithDelta($expected, float $delta, string $message = ''): self
    {
        PHPUnit::assertEqualsWithDelta($expected, $this->actual, $delta, $message);

        return $this;
    }

    public function xmlFileNotToEqualXmlFile($expectedFile, string $message = ''): self
    {
        Expect::XmlFile($this->actual)->notToEqualXmlFile($expectedFile, $message);

        return $this;
    }

    public function xmlFileToEqualXmlFile($expectedFile, string $message = ''): self
    {
        Expect::XmlFile($this->actual)->toEqualXmlFile($expectedFile, $message);

        return $this;
    }

    public function xmlStringNotToEqualXmlFile($expectedFile, string $message = ''): self
    {
        Expect::XmlString($this->actual)->notToEqualXmlFile($expectedFile, $message);

        return $this;
    }

    public function xmlStringNotToEqualXmlString($expectedXml, string $message = ''): self
    {
        Expect::XmlString($this->actual)->notToEqualXmlString($expectedXml, $message);

        return $this;
    }

    public function xmlStringToEqualXmlFile($expectedFile, string $message = ''): self
    {
        Expect::XmlString($this->actual)->toEqualXmlFile($expectedFile, $message);

        return $this;
    }

    public function xmlStringToEqualXmlString($expectedXml, string $message = ''): self
    {
        Expect::XmlString($this->actual)->toEqualXmlString($expectedXml, $message);

        return $this;
    }
}
