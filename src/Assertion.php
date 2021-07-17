<?php

namespace Realodix\NextProject;

use PHPUnit\Framework\Assert as PHPUnit;
use PHPUnit\Runner\Version as PHPUnitVersion;
use Realodix\NextProject\Support\Validator;

class Assertion
{
    use Traits\ExtendedTrait;
    use Traits\AliasesTrait;

    /** @var mixed */
    public $actual = null;

    /**
     * @param mixed $actual
     */
    public function __construct($actual)
    {
        $this->actual = $actual;
    }

    public function containsOnly($type, $isNativeType = null, string $message = ''): self
    {
        PHPUnit::assertContainsOnly($type, $this->actual, $isNativeType, $message);

        return $this;
    }

    public function notContainsOnly($type, $isNativeType = null, string $message = ''): self
    {
        PHPUnit::assertNotContainsOnly($type, $this->actual, $isNativeType, $message);

        return $this;
    }

    /**
     * Asserts that a string is a valid JSON string.
     *
     * @param string $message
     */
    public function json(string $message = ''): self
    {
        PHPUnit::assertJson($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a string matches a given regular expression.
     *
     * @param string $pattern
     * @param string $message
     */
    public function matchesRegularExpression(string $pattern, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertRegExp($pattern, $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertMatchesRegularExpression($pattern, $this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a string does not match a given regular expression.
     *
     * @param string $pattern
     * @param string $message
     */
    public function doesNotMatchRegularExpression(string $pattern, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotRegExp($pattern, $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertDoesNotMatchRegularExpression($pattern, $this->actual, $message);

        return $this;
    }

    public function stringContainsString(string $needle, string $message = ''): self
    {
        PHPUnit::assertStringContainsString($needle, $this->actual, $message);

        return $this;
    }

    public function stringNotContainsString(string $needle, string $message = ''): self
    {
        PHPUnit::assertStringNotContainsString($needle, $this->actual, $message);

        return $this;
    }

    public function stringContainsStringIgnoringCase(string $needle, string $message = ''): self
    {
        PHPUnit::assertStringContainsStringIgnoringCase($needle, $this->actual, $message);

        return $this;
    }

    public function stringNotContainsStringIgnoringCase(string $needle, string $message = ''): self
    {
        PHPUnit::assertStringNotContainsStringIgnoringCase($needle, $this->actual, $message);

        return $this;
    }

    public function stringMatchesFormat($format, string $message = ''): self
    {
        PHPUnit::assertStringMatchesFormat($format, $this->actual, $message);

        return $this;
    }

    public function stringNotMatchesFormat($format, string $message = ''): self
    {
        PHPUnit::assertStringNotMatchesFormat($format, $this->actual, $message);

        return $this;
    }

    public function stringMatchesFormatFile($formatFile, string $message = ''): self
    {
        PHPUnit::assertStringMatchesFormatFile($formatFile, $this->actual, $message);

        return $this;
    }

    public function stringNotMatchesFormatFile($formatFile, string $message = ''): self
    {
        PHPUnit::assertStringNotMatchesFormatFile($formatFile, $this->actual, $message);

        return $this;
    }

    public function stringStartsNotWith($prefix, string $message = ''): self
    {
        PHPUnit::assertStringStartsNotWith($prefix, $this->actual, $message);

        return $this;
    }

    public function stringStartsWith($prefix, string $message = ''): self
    {
        PHPUnit::assertStringStartsWith($prefix, $this->actual, $message);

        return $this;
    }

    public function stringEndsWith($suffix, string $message = ''): self
    {
        PHPUnit::assertStringEndsWith($suffix, $this->actual, $message);

        return $this;
    }

    public function stringEndsNotWith($suffix, string $message = ''): self
    {
        PHPUnit::assertStringEndsNotWith($suffix, $this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is of type array.
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
     * Asserts that a variable is not of type array.
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
     * Asserts that a variable is of type bool.
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
     * Asserts that a variable is not of type bool.
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
     * Asserts that a variable is of type callable.
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
     * Asserts that a variable is not of type callable.
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
     * Asserts that a variable is of type resource and is closed.
     *
     * @param string $message
     *
     * @return self
     */
    public function isClosedResource(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.3', '<')) {
            // @codeCoverageIgnoreStart
            if ($message === '') {
                $message = \sprintf(
                    'Failed asserting that %s is of type "resource (closed)"',
                    \var_export($this->actual, true)
                );
            }

            PHPUnit::assertTrue(Validator::isClosedResource($this->actual), $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsClosedResource($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is not of type resource or is an open resource.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotClosedResource(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.3', '<')) {
            // @codeCoverageIgnoreStart
            if ($message === '') {
                $message = \sprintf(
                    'Failed asserting that %s is not of type "resource (closed)"',
                    \var_export($this->actual, true)
                );
            }

            PHPUnit::assertFalse(Validator::isClosedResource($this->actual), $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsNotClosedResource($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is of type float.
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
     * Asserts that a variable is not of type float.
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
     * Asserts that a variable is of type int.
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
     * Asserts that a variable is not of type int.
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
     * Asserts that a variable is of type iterable.
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
     * Asserts that a variable is not of type iterable.
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
     * Asserts that a variable is of type numeric.
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
     * Asserts that a variable is not of type numeric.
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
     * Asserts that a variable is of type object.
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
     * Asserts that a variable is not of type object.
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
     * Asserts that a variable is of type resource.
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
     * Asserts that a variable is not of type resource.
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
     * Asserts that a variable is of type scalar.
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
     * Asserts that a variable is not of type scalar.
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
     * Asserts that a variable is of type string.
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

    /**
     * Asserts that a variable is not of type string.
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

    public function directoryExists(string $message = ''): self
    {
        PHPUnit::assertDirectoryExists($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a directory does not exist.
     *
     * @param string $message
     */
    public function directoryDoesNotExist(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertDirectoryNotExists($this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertDirectoryDoesNotExist($this->actual, $message);

        return $this;
    }

    public function directoryIsReadable(string $message = ''): self
    {
        PHPUnit::assertDirectoryIsReadable($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a directory exists and is not readable.
     *
     * @param string $message
     */
    public function directoryIsNotReadable(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertDirectoryNotIsReadable($this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertDirectoryIsNotReadable($this->actual, $message);

        return $this;
    }

    public function directoryIsWritable(string $message = ''): self
    {
        PHPUnit::assertDirectoryIsWritable($this->actual, $message);

        return $this;
    }

    public function directoryIsNotWritable(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertDirectoryNotIsWritable($this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertDirectoryIsNotWritable($this->actual, $message);

        return $this;
    }

    public function fileExists(string $message = ''): self
    {
        PHPUnit::assertFileExists($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a file does not exist.
     *
     * @param string $message
     */
    public function fileDoesNotExist(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertFileNotExists($this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertFileDoesNotExist($this->actual, $message);

        return $this;
    }

    public function fileIsReadable(string $message = ''): self
    {
        PHPUnit::assertFileIsReadable($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a file exists and is not readable.
     *
     * @param string $message
     */
    public function fileIsNotReadable(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertFileNotIsReadable($this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertFileIsNotReadable($this->actual, $message);

        return $this;
    }

    public function fileIsWritable(string $message = ''): self
    {
        PHPUnit::assertFileIsWritable($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a file exists and is not writable.
     *
     * @param string $message
     */
    public function fileIsNotWritable(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertFileNotIsWritable($this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertFileIsNotWritable($this->actual, $message);

        return $this;
    }

    public function isReadable(string $message = ''): self
    {
        PHPUnit::assertIsReadable($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a file/dir exists and is not readable.
     *
     * @param string $message
     */
    public function isNotReadable(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotIsReadable($this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsNotReadable($this->actual, $message);

        return $this;
    }

    public function isWritable(string $message = ''): self
    {
        PHPUnit::assertIsWritable($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a file/dir exists and is not writable.
     *
     * @param string $message
     */
    public function isNotWritable(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotIsWritable($this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsNotWritable($this->actual, $message);

        return $this;
    }

    public function true(string $message = ''): self
    {
        PHPUnit::assertTrue($this->actual, $message);

        return $this;
    }

    public function notTrue(string $message = ''): self
    {
        PHPUnit::assertNotTrue($this->actual, $message);

        return $this;
    }

    public function false(string $message = ''): self
    {
        PHPUnit::assertFalse($this->actual, $message);

        return $this;
    }

    public function notFalse(string $message = ''): self
    {
        PHPUnit::assertNotFalse($this->actual, $message);

        return $this;
    }

    public function null(string $message = ''): self
    {
        PHPUnit::assertNull($this->actual, $message);

        return $this;
    }

    public function notNull(string $message = ''): self
    {
        PHPUnit::assertNotNull($this->actual, $message);

        return $this;
    }

    public function same($expected, string $message = ''): self
    {
        PHPUnit::assertSame($expected, $this->actual, $message);

        return $this;
    }

    public function notSame($expected, string $message = ''): self
    {
        PHPUnit::assertNotSame($expected, $this->actual, $message);

        return $this;
    }

    public function sameSize($expected, string $message = ''): self
    {
        PHPUnit::assertSameSize($expected, $this->actual, $message);

        return $this;
    }

    public function notSameSize($expected, string $message = ''): self
    {
        PHPUnit::assertNotSameSize($expected, $this->actual, $message);

        return $this;
    }

    public function equals($expected, string $message = ''): self
    {
        PHPUnit::assertEquals($expected, $this->actual, $message);

        return $this;
    }

    public function notEquals($expected, string $message = ''): self
    {
        PHPUnit::assertNotEquals($expected, $this->actual, $message);

        return $this;
    }

    public function containsEquals($needle, string $message = ''): self
    {
        PHPUnit::assertContainsEquals($needle, $this->actual, $message);

        return $this;
    }

    public function notContainsEquals($needle, string $message = ''): self
    {
        PHPUnit::assertNotContainsEquals($needle, $this->actual, $message);

        return $this;
    }

    public function equalsCanonicalizing($expected, string $message = ''): self
    {
        PHPUnit::assertEqualsCanonicalizing($expected, $this->actual, $message);

        return $this;
    }

    public function notEqualsCanonicalizing($expected, string $message = ''): self
    {
        PHPUnit::assertNotEqualsCanonicalizing($expected, $this->actual, $message);

        return $this;
    }

    public function equalsIgnoringCase($expected, string $message = ''): self
    {
        PHPUnit::assertEqualsIgnoringCase($expected, $this->actual, $message);

        return $this;
    }

    public function notEqualsIgnoringCase($expected, string $message = ''): self
    {
        PHPUnit::assertNotEqualsIgnoringCase($expected, $this->actual, $message);

        return $this;
    }

    public function equalsWithDelta($expected, float $delta, string $message = ''): self
    {
        PHPUnit::assertEqualsWithDelta($expected, $this->actual, $delta, $message);

        return $this;
    }

    public function notEqualsWithDelta($expected, float $delta, string $message = ''): self
    {
        PHPUnit::assertNotEqualsWithDelta($expected, $this->actual, $delta, $message);

        return $this;
    }

    public function fileEquals($expected, string $message = ''): self
    {
        PHPUnit::assertFileEquals($expected, $this->actual, $message);

        return $this;
    }

    public function fileNotEquals(string $expected, string $message = ''): self
    {
        PHPUnit::assertFileNotEquals($expected, $this->actual, $message);

        return $this;
    }

    public function fileEqualsCanonicalizing(string $expected, string $message = ''): self
    {
        PHPUnit::assertFileEqualsCanonicalizing($expected, $this->actual, $message);

        return $this;
    }

    public function fileNotEqualsCanonicalizing(string $expected, string $message = ''): self
    {
        PHPUnit::assertFileNotEqualsCanonicalizing($expected, $this->actual, $message);

        return $this;
    }

    public function fileEqualsIgnoringCase(string $expected, string $message = ''): self
    {
        PHPUnit::assertFileEqualsIgnoringCase($expected, $this->actual, $message);

        return $this;
    }

    public function fileNotEqualsIgnoringCase(string $expected, string $message = ''): self
    {
        PHPUnit::assertFileNotEqualsIgnoringCase($expected, $this->actual, $message);

        return $this;
    }

    public function greaterThan($expected, string $message = ''): self
    {
        PHPUnit::assertGreaterThan($expected, $this->actual, $message);

        return $this;
    }

    public function lessThan($expected, string $message = ''): self
    {
        PHPUnit::assertLessThan($expected, $this->actual, $message);

        return $this;
    }

    public function greaterThanOrEqual($expected, string $message = ''): self
    {
        PHPUnit::assertGreaterThanOrEqual($expected, $this->actual, $message);

        return $this;
    }

    public function lessThanOrEqual($expected, string $message = ''): self
    {
        PHPUnit::assertLessThanOrEqual($expected, $this->actual, $message);

        return $this;
    }

    public function jsonFileEqualsJsonFile(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertJsonFileEqualsJsonFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function jsonFileNotEqualsJsonFile(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertJsonFileNotEqualsJsonFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function jsonStringEqualsJsonFile(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertJsonStringEqualsJsonFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function jsonStringNotEqualsJsonFile(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertJsonStringNotEqualsJsonFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function jsonStringEqualsJsonString(string $expectedJson, string $message = ''): self
    {
        PHPUnit::assertJsonStringEqualsJsonString($expectedJson, $this->actual, $message);

        return $this;
    }

    public function jsonStringNotEqualsJsonString($expectedJson, string $message = ''): self
    {
        PHPUnit::assertJsonStringNotEqualsJsonString($expectedJson, $this->actual, $message);

        return $this;
    }

    public function stringEqualsFileCanonicalizing(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertStringEqualsFileCanonicalizing($expectedFile, $this->actual, $message);

        return $this;
    }

    public function stringNotEqualsFileCanonicalizing(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertStringNotEqualsFileCanonicalizing($expectedFile, $this->actual, $message);

        return $this;
    }

    public function stringEqualsFileIgnoringCase(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertStringEqualsFileIgnoringCase($expectedFile, $this->actual, $message);

        return $this;
    }

    public function stringNotEqualsFileIgnoringCase(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertStringNotEqualsFileIgnoringCase($expectedFile, $this->actual, $message);

        return $this;
    }

    public function xmlFileEqualsXmlFile(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertXmlFileEqualsXmlFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function xmlFileNotEqualsXmlFile(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertXmlFileNotEqualsXmlFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function xmlStringEqualsXmlFile(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertXmlStringEqualsXmlFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function xmlStringNotEqualsXmlFile(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertXmlStringNotEqualsXmlFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function xmlStringEqualsXmlString($expectedXml, string $message = ''): self
    {
        PHPUnit::assertXmlStringEqualsXmlString($expectedXml, $this->actual, $message);

        return $this;
    }

    public function xmlStringNotEqualsXmlString($expectedXml, string $message = ''): self
    {
        PHPUnit::assertXmlStringNotEqualsXmlString($expectedXml, $this->actual, $message);

        return $this;
    }

    public function classHasAttribute($attributeName, string $message = ''): self
    {
        PHPUnit::assertClassHasAttribute($attributeName, $this->actual, $message);

        return $this;
    }

    public function classNotHasAttribute($attributeName, string $message = ''): self
    {
        PHPUnit::assertClassNotHasAttribute($attributeName, $this->actual, $message);

        return $this;
    }

    public function classHasStaticAttribute($attributeName, string $message = ''): self
    {
        PHPUnit::assertClassHasStaticAttribute($attributeName, $this->actual, $message);

        return $this;
    }

    public function classNotHasStaticAttribute($attributeName, string $message = ''): self
    {
        PHPUnit::assertClassNotHasStaticAttribute($attributeName, $this->actual, $message);

        return $this;
    }

    public function containsOnlyInstancesOf($className, string $message = ''): self
    {
        PHPUnit::assertContainsOnlyInstancesOf($className, $this->actual, $message);

        return $this;
    }

    public function instanceOf(string $expected, string $message = ''): self
    {
        PHPUnit::assertInstanceOf($expected, $this->actual, $message);

        return $this;
    }

    public function notInstanceOf(string $expected, string $message = ''): self
    {
        PHPUnit::assertNotInstanceOf($expected, $this->actual, $message);

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

        if (is_callable($callback)) {
            foreach ($this->actual as $item) {
                $callback(new self($item));
            }
        }

        return new Each($this);
    }

    /**
     * Asserts that an array has a specified key.
     *
     * @param int|string $key
     * @param string     $message
     */
    public function arrayHasKey($key, string $message = ''): self
    {
        PHPUnit::assertArrayHasKey($key, $this->actual, $message);

        return $this;
    }

    /**
     * Asserts that an array does not have a specified key.
     *
     * @param int|string $key
     * @param string     $message
     */
    public function arrayNotHasKey($key, string $message = ''): self
    {
        PHPUnit::assertArrayNotHasKey($key, $this->actual, $message);

        return $this;
    }

    /**
     * Asserts the number of elements of an array, Countable or Traversable.
     *
     * @param int    $expectedCount
     * @param string $message
     */
    public function count(int $expectedCount, string $message = ''): self
    {
        PHPUnit::assertCount($expectedCount, $this->actual, $message);

        return $this;
    }

    /**
     * Asserts the number of elements of an array, Countable or Traversable.
     *
     * @param int    $expectedCount
     * @param string $message
     */
    public function notCount(int $expectedCount, string $message = ''): self
    {
        PHPUnit::assertNotCount($expectedCount, $this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is empty.
     *
     * @param string $message
     */
    public function empty(string $message = ''): self
    {
        PHPUnit::assertEmpty($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is not empty.
     *
     * @param string $message
     */
    public function notEmpty(string $message = ''): self
    {
        PHPUnit::assertNotEmpty($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is finite.
     *
     * @param string $message
     */
    public function finite(string $message = ''): self
    {
        PHPUnit::assertFinite($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is infinite.
     *
     * @param string $message
     */
    public function infinite(string $message = ''): self
    {
        PHPUnit::assertInfinite($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is nan.
     *
     * @param string $message
     */
    public function nan(string $message = ''): self
    {
        PHPUnit::assertNan($this->actual, $message);

        return $this;
    }
}
