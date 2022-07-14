<?php

namespace Realodix\NextProject\Traits;

trait PHPUnitShortNameTrait
{
    public function dirExists(string $message = ''): self
    {
        return $this->directoryExists($this->actual, $message);
    }

    public function dirNotExist(string $message = ''): self
    {
        return $this->directoryDoesNotExist($message);
    }

    public function dirIsReadable(string $message = ''): self
    {
        return $this->directoryIsReadable($message);
    }

    public function dirIsNotReadable(string $message = ''): self
    {
        return $this->directoryIsNotReadable($message);
    }

    public function dirIsWritable(string $message = ''): self
    {
        return $this->directoryIsWritable($message);
    }

    public function dirIsNotWritable(string $message = ''): self
    {
        return $this->directoryIsNotWritable($message);
    }

    /**
     * @param mixed $expected
     */
    public function greater($expected, string $message = ''): self
    {
        return $this->greaterThan($expected, $message);
    }

    /**
     * @param mixed $expected
     */
    public function isAbove($expected, string $message = ''): self
    {
        return $this->greaterThan($expected, $message);
    }

    /**
     * @param mixed $expected
     */
    public function less($expected, string $message = ''): self
    {
        return $this->lessThan($expected, $message);
    }

    /**
     * @param mixed $expected
     */
    public function isBelow($expected, string $message = ''): self
    {
        return $this->lessThan($expected, $message);
    }

    /**
     * @param mixed $expected
     */
    public function greaterOrEqual($expected, string $message = ''): self
    {
        return $this->greaterThanOrEqual($expected, $message);
    }

    /**
     * @param mixed $expected
     */
    public function isAtLeast($expected, string $message = ''): self
    {
        return $this->greaterThanOrEqual($expected, $message);
    }

    /**
     * @param mixed $expected
     */
    public function lessOrEqual($expected, string $message = ''): self
    {
        return $this->lessThanOrEqual($expected, $message);
    }

    /**
     * @param mixed $expected
     */
    public function isAtMost($expected, string $message = ''): self
    {
        return $this->lessThanOrEqual($expected, $message);
    }

    /**
     * @param int|string $key
     * @param null|mixed $value
     */
    public function hasKey($key, $value = null, string $message = ''): self
    {
        return $this->arrayHasKey($key, $value, $message);
    }

    /**
     * @param int|string $key
     * @param null|mixed $value
     */
    public function notHasKey($key, $value = null, string $message = ''): self
    {
        return $this->arrayNotHasKey($key, $value, $message);
    }

    public function jsonFileToFile(string $expectedFile, string $message = ''): self
    {
        return $this->jsonFileEqualsJsonFile($expectedFile, $message);
    }

    public function jsonFileNotToFile(string $expectedFile, string $message = ''): self
    {
        return $this->jsonFileNotEqualsJsonFile($expectedFile, $message);
    }

    public function jsonStringToFile(string $expectedFile, string $message = ''): self
    {
        return $this->jsonStringEqualsJsonFile($expectedFile, $message);
    }

    public function jsonStringNotToFile(string $expectedFile, string $message = ''): self
    {
        return $this->jsonStringNotEqualsJsonFile($expectedFile, $message);
    }

    public function jsonStringToString(string $expectedJson, string $message = ''): self
    {
        return $this->jsonStringEqualsJsonString($expectedJson, $message);
    }

    public function jsonStringNotToString(string $expectedJson, string $message = ''): self
    {
        return $this->jsonStringNotEqualsJsonString($expectedJson, $message);
    }

    public function match(string $pattern, string $message = ''): self
    {
        return $this->matchesRegularExpression($pattern, $message);
    }

    public function notMatch(string $pattern, string $message = ''): self
    {
        return $this->doesNotMatchRegularExpression($pattern, $message);
    }

    public function startWith(string $prefix, string $message = ''): self
    {
        return $this->stringStartsWith($prefix, $message);
    }

    public function startNotWith(string $prefix, string $message = ''): self
    {
        return $this->stringStartsNotWith($prefix, $message);
    }

    public function endWith(string $suffix, string $message = ''): self
    {
        return $this->stringEndsWith($suffix, $message);
    }

    public function endNotWith(string $suffix, string $message = ''): self
    {
        return $this->stringEndsNotWith($suffix, $message);
    }

    /**
     * @param mixed $expectedFile
     */
    public function xmlFileToFile($expectedFile, string $message = ''): self
    {
        return $this->xmlFileEqualsXmlFile($expectedFile, $message);
    }

    public function xmlFileNotToFile(string $expectedFile, string $message = ''): self
    {
        return $this->xmlFileNotEqualsXmlFile($expectedFile, $message);
    }

    public function xmlStringToFile(string $expectedFile, string $message = ''): self
    {
        return $this->xmlStringEqualsXmlFile($expectedFile, $message);
    }

    public function xmlStringNotToFile(string $expectedFile, string $message = ''): self
    {
        return $this->xmlStringNotEqualsXmlFile($expectedFile, $message);
    }

    /**
     * @param mixed $expectedXml
     */
    public function xmlStringToString($expectedXml, string $message = ''): self
    {
        return $this->xmlStringEqualsXmlString($expectedXml, $message);
    }

    /**
     * @param mixed $expectedXml
     */
    public function xmlStringNotToString($expectedXml, string $message = ''): self
    {
        return $this->xmlStringNotEqualsXmlString($expectedXml, $message);
    }
}
