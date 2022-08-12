<?php

namespace Realodix\Dessert\Traits;

trait PHPUnitShortNameTrait
{
    public function dirExists(string $message = ''): self
    {
        return $this->directoryExists($message);
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

    public function greater(mixed $expected, string $message = ''): self
    {
        return $this->greaterThan($expected, $message);
    }

    public function isAbove(mixed $expected, string $message = ''): self
    {
        return $this->greaterThan($expected, $message);
    }

    public function less(mixed $expected, string $message = ''): self
    {
        return $this->lessThan($expected, $message);
    }

    public function isBelow(mixed $expected, string $message = ''): self
    {
        return $this->lessThan($expected, $message);
    }

    public function greaterOrEqual(mixed $expected, string $message = ''): self
    {
        return $this->greaterThanOrEqual($expected, $message);
    }

    public function isAtLeast(mixed $expected, string $message = ''): self
    {
        return $this->greaterThanOrEqual($expected, $message);
    }

    public function lessOrEqual(mixed $expected, string $message = ''): self
    {
        return $this->lessThanOrEqual($expected, $message);
    }

    public function isAtMost(mixed $expected, string $message = ''): self
    {
        return $this->lessThanOrEqual($expected, $message);
    }

    public function hasKey(int|string $key, string $message = ''): self
    {
        return $this->arrayHasKey($key, $message);
    }

    public function notHasKey(int|string $key, string $message = ''): self
    {
        return $this->arrayNotHasKey($key, $message);
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

    public function xmlFileToFile(string $expectedFile, string $message = ''): self
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

    public function xmlStringToString(string $expectedXml, string $message = ''): self
    {
        return $this->xmlStringEqualsXmlString($expectedXml, $message);
    }

    public function xmlStringNotToString(string $expectedXml, string $message = ''): self
    {
        return $this->xmlStringNotEqualsXmlString($expectedXml, $message);
    }
}
