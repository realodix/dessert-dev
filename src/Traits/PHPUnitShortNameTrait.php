<?php

namespace Realodix\NextProject\Traits;

trait PHPUnitShortNameTrait
{
    /**
     * @param string $message
     */
    public function dirExists(string $message = ''): self
    {
        return $this->directoryExists($this->actual, $message);
    }

    /**
     * @param string $message
     */
    public function dirNotExist(string $message = ''): self
    {
        return $this->directoryDoesNotExist($message);
    }

    /**
     * @param string $message
     */
    public function dirIsReadable(string $message = ''): self
    {
        return $this->directoryIsReadable($message);
    }

    /**
     * @param string $message
     */
    public function dirIsNotReadable(string $message = ''): self
    {
        return $this->directoryIsNotReadable($message);
    }

    /**
     * @param string $message
     */
    public function dirIsWritable(string $message = ''): self
    {
        return $this->directoryIsWritable($message);
    }

    /**
     * @param string $message
     */
    public function dirIsNotWritable(string $message = ''): self
    {
        return $this->directoryIsNotWritable($message);
    }

    /**
     * @param mixed  $expected
     * @param string $message
     */
    public function greater($expected, string $message = ''): self
    {
        return $this->greaterThan($expected, $message);
    }

    /**
     * @param mixed  $expected
     * @param string $message
     */
    public function isAbove($expected, string $message = ''): self
    {
        return $this->greaterThan($expected, $message);
    }

    /**
     * @param mixed  $expected
     * @param string $message
     */
    public function less($expected, string $message = ''): self
    {
        return $this->lessThan($expected, $message);
    }

    /**
     * @param mixed  $expected
     * @param string $message
     */
    public function isBelow($expected, string $message = ''): self
    {
        return $this->lessThan($expected, $message);
    }

    /**
     * @param mixed  $expected
     * @param string $message
     */
    public function greaterOrEqual($expected, string $message = ''): self
    {
        return $this->greaterThanOrEqual($expected, $message);
    }

    /**
     * @param mixed  $expected
     * @param string $message
     */
    public function isAtLeast($expected, string $message = ''): self
    {
        return $this->greaterThanOrEqual($expected, $message);
    }

    /**
     * @param mixed  $expected
     * @param string $message
     */
    public function lessOrEqual($expected, string $message = ''): self
    {
        return $this->lessThanOrEqual($expected, $message);
    }

    /**
     * @param mixed  $expected
     * @param string $message
     */
    public function isAtMost($expected, string $message = ''): self
    {
        return $this->lessThanOrEqual($expected, $message);
    }

    /**
     * @param int|string $key
     * @param null|mixed $value
     * @param string     $message
     */
    public function hasKey($key, $value = null, string $message = ''): self
    {
        return $this->arrayHasKey($key, $value, $message);
    }

    /**
     * @param int|string $key
     * @param null|mixed $value
     * @param string     $message
     */
    public function notHasKey($key, $value = null, string $message = ''): self
    {
        return $this->arrayNotHasKey($key, $value, $message);
    }

    /**
     * @param string $expectedFile
     * @param string $message
     */
    public function jsonFileToFile(string $expectedFile, string $message = ''): self
    {
        return $this->jsonFileEqualsJsonFile($expectedFile, $message);
    }

    /**
     * @param string $expectedFile
     * @param string $message
     */
    public function jsonFileNotToFile(string $expectedFile, string $message = ''): self
    {
        return $this->jsonFileNotEqualsJsonFile($expectedFile, $message);
    }

    /**
     * @param string $expectedFile
     * @param string $message
     */
    public function jsonStringToFile(string $expectedFile, string $message = ''): self
    {
        return $this->jsonStringEqualsJsonFile($expectedFile, $message);
    }

    /**
     * @param string $expectedFile
     * @param string $message
     */
    public function jsonStringNotToFile(string $expectedFile, string $message = ''): self
    {
        return $this->jsonStringNotEqualsJsonFile($expectedFile, $message);
    }

    /**
     * @param string $expectedJson
     * @param string $message
     */
    public function jsonStringToString(string $expectedJson, string $message = ''): self
    {
        return $this->jsonStringEqualsJsonString($expectedJson, $message);
    }

    /**
     * @param string $expectedJson
     * @param string $message
     */
    public function jsonStringNotToString(string $expectedJson, string $message = ''): self
    {
        return $this->jsonStringNotEqualsJsonString($expectedJson, $message);
    }

    /**
     * @param string $pattern
     * @param string $message
     */
    public function match(string $pattern, string $message = ''): self
    {
        return $this->matchesRegularExpression($pattern, $message);
    }

    /**
     * @param string $pattern
     * @param string $message
     */
    public function notMatch(string $pattern, string $message = ''): self
    {
        return $this->doesNotMatchRegularExpression($pattern, $message);
    }

    /**
     * @param string $prefix
     * @param string $message
     */
    public function startWith(string $prefix, string $message = ''): self
    {
        return $this->stringStartsWith($prefix, $message);
    }

    /**
     * @param string $prefix
     * @param string $message
     */
    public function startNotWith(string $prefix, string $message = ''): self
    {
        return $this->stringStartsNotWith($prefix, $message);
    }

    /**
     * @param string $suffix
     * @param string $message
     */
    public function endWith(string $suffix, string $message = ''): self
    {
        return $this->stringEndsWith($suffix, $message);
    }

    /**
     * @param string $suffix
     * @param string $message
     */
    public function endNotWith(string $suffix, string $message = ''): self
    {
        return $this->stringEndsNotWith($suffix, $message);
    }

    /**
     * @param mixed  $expectedFile
     * @param string $message
     */
    public function xmlFileToFile($expectedFile, string $message = ''): self
    {
        return $this->xmlFileEqualsXmlFile($expectedFile, $message);
    }

    /**
     * @param string $expectedFile
     * @param string $message
     */
    public function xmlFileNotToFile(string $expectedFile, string $message = ''): self
    {
        return $this->xmlFileNotEqualsXmlFile($expectedFile, $message);
    }

    /**
     * @param string $expectedFile
     * @param string $message
     */
    public function xmlStringToFile(string $expectedFile, string $message = ''): self
    {
        return $this->xmlStringEqualsXmlFile($expectedFile, $message);
    }

    /**
     * @param string $expectedFile
     * @param string $message
     */
    public function xmlStringNotToFile(string $expectedFile, string $message = ''): self
    {
        return $this->xmlStringNotEqualsXmlFile($expectedFile, $message);
    }

    /**
     * @param mixed  $expectedXml
     * @param string $message
     */
    public function xmlStringToString($expectedXml, string $message = ''): self
    {
        return $this->xmlStringEqualsXmlString($expectedXml, $message);
    }

    /**
     * @param mixed  $expectedXml
     * @param string $message
     */
    public function xmlStringNotToString($expectedXml, string $message = ''): self
    {
        return $this->xmlStringNotEqualsXmlString($expectedXml, $message);
    }
}
