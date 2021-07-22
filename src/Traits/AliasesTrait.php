<?php

namespace Realodix\NextProject\Traits;

trait AliasesTrait
{
    public function dirExists($message = ''): self
    {
        return $this->directoryExists($this->actual, $message);
    }

    public function dirNotExist($message = ''): self
    {
        return $this->directoryDoesNotExist($message);
    }

    public function dirIsReadable($message = ''): self
    {
        return $this->directoryIsReadable($message);
    }

    public function dirIsNotReadable($message = ''): self
    {
        return $this->directoryIsNotReadable($message);
    }

    public function dirIsWritable($message = ''): self
    {
        return $this->directoryIsWritable($message);
    }

    public function dirIsNotWritable($message = ''): self
    {
        return $this->directoryIsNotWritable($message);
    }

    public function greater($expected, $message = ''): self
    {
        return $this->greaterThan($expected, $message);
    }

    public function isAbove($expected, $message = ''): self
    {
        return $this->greaterThan($expected, $message);
    }

    public function less($expected, $message = ''): self
    {
        return $this->lessThan($expected, $message);
    }

    public function isBelow($expected, $message = ''): self
    {
        return $this->lessThan($expected, $message);
    }

    public function greaterOrEqual($expected, $message = ''): self
    {
        return $this->greaterThanOrEqual($expected, $message);
    }

    public function isAtLeast($expected, $message = ''): self
    {
        return $this->greaterThanOrEqual($expected, $message);
    }

    public function lessOrEqual($expected, $message = ''): self
    {
        return $this->lessThanOrEqual($expected, $message);
    }

    public function isAtMost($expected, $message = ''): self
    {
        return $this->lessThanOrEqual($expected, $message);
    }

    public function hasKey($key, $message = ''): self
    {
        return $this->arrayHasKey($key, $message);
    }

    public function notHasKey($key, $message = ''): self
    {
        return $this->arrayNotHasKey($key, $message);
    }

    public function jsonFileToFile($expectedFile, $message = ''): self
    {
        return $this->jsonFileEqualsJsonFile($expectedFile, $message);
    }

    public function jsonFileNotToFile($expectedFile, $message = ''): self
    {
        return $this->jsonFileNotEqualsJsonFile($expectedFile, $message);
    }

    public function jsonStringToFile($expectedFile, $message = ''): self
    {
        return $this->jsonStringEqualsJsonFile($expectedFile, $message);
    }

    public function jsonStringNotToFile($expectedFile, $message = ''): self
    {
        return $this->jsonStringNotEqualsJsonFile($expectedFile, $message);
    }

    public function jsonStringToString($expectedJson, $message = ''): self
    {
        return $this->jsonStringEqualsJsonString($expectedJson, $message);
    }

    public function jsonStringNotToString($expectedJson, $message = ''): self
    {
        return $this->jsonStringNotEqualsJsonString($expectedJson, $message);
    }

    public function match(string $pattern, $message = ''): self
    {
        return $this->matchesRegularExpression($pattern, $message);
    }

    public function notMatch(string $pattern, $message = ''): self
    {
        return $this->doesNotMatchRegularExpression($pattern, $message);
    }

    public function startWith($prefix, $message = ''): self
    {
        return $this->stringStartsWith($prefix, $message);
    }

    public function startNotWith($prefix, $message = ''): self
    {
        return $this->stringStartsNotWith($prefix, $message);
    }

    public function endWith($suffix, $message = ''): self
    {
        return $this->stringEndsWith($suffix, $message);
    }

    public function endNotWith($suffix, $message = ''): self
    {
        return $this->stringEndsNotWith($suffix, $message);
    }

    public function xmlFileToFile($expectedFile, $message = ''): self
    {
        return $this->xmlFileEqualsXmlFile($expectedFile, $message);
    }

    public function xmlFileNotToFile($expectedFile, $message = ''): self
    {
        return $this->xmlFileNotEqualsXmlFile($expectedFile, $message);
    }

    public function xmlStringToFile($expectedFile, $message = ''): self
    {
        return $this->xmlStringEqualsXmlFile($expectedFile, $message);
    }

    public function xmlStringNotToFile($expectedFile, $message = ''): self
    {
        return $this->xmlStringNotEqualsXmlFile($expectedFile, $message);
    }

    public function xmlStringToString($expectedXml, $message = ''): self
    {
        return $this->xmlStringEqualsXmlString($expectedXml, $message);
    }

    public function xmlStringNotToString($expectedXml, $message = ''): self
    {
        return $this->xmlStringNotEqualsXmlString($expectedXml, $message);
    }
}
