<?php

namespace Realodix\NextProject\Traits;

trait ShortcutTrait
{
    public function dirExists(string $message = ''): self
    {
        return $this->directoryExists($this->actual, $message);
    }

    public function dirNotExist(string $message = ''): self
    {
        return $this->directoryDoesNotExist($message);
    }

    public function dirNotReadable(string $message = ''): self
    {
        return $this->directoryIsNotReadable($message);
    }

    public function dirNotWritable(string $message = ''): self
    {
        return $this->directoryIsNotWritable($message);
    }

    public function dirReadable(string $message = ''): self
    {
        return $this->directoryIsReadable($message);
    }

    public function dirWritable(string $message = ''): self
    {
        return $this->directoryIsWritable($message);
    }

    public function greater($expected, string $message = ''): self
    {
        return $this->greaterThan($expected, $message);
    }

    public function greaterOrEqual($expected, string $message = ''): self
    {
        return $this->greaterThanOrEqual($expected, $message);
    }

    public function isAbove($expected, string $message = ''): self
    {
        return $this->greaterThan($expected, $message);
    }

    public function isAtLeast($expected, string $message = ''): self
    {
        return $this->greaterThanOrEqual($expected, $message);
    }

    public function isAtMost($expected, string $message = ''): self
    {
        return $this->lessThanOrEqual($expected, $message);
    }

    public function isBelow($expected, string $message = ''): self
    {
        return $this->lessThan($expected, $message);
    }

    public function jsonFileNotToFile($expectedFile, string $message = ''): self
    {
        return $this->jsonFileNotEqualsJsonFile($expectedFile, $message);
    }

    public function jsonFileToFile($expectedFile, string $message = ''): self
    {
        return $this->jsonFileEqualsJsonFile($expectedFile, $message);
    }

    public function jsonStringNotToFile($expectedFile, string $message = ''): self
    {
        return $this->jsonStringNotEqualsJsonFile($expectedFile, $message);
    }

    public function jsonStringNotToString($expectedJson, string $message = ''): self
    {
        return $this->jsonStringNotEqualsJsonString($expectedJson, $message);
    }

    public function jsonStringToFile($expectedFile, string $message = ''): self
    {
        return $this->jsonStringEqualsJsonFile($expectedFile, $message);
    }

    public function jsonStringToString($expectedJson, string $message = ''): self
    {
        return $this->jsonStringEqualsJsonString($expectedJson, $message);
    }

    public function less($expected, string $message = ''): self
    {
        return $this->lessThan($expected, $message);
    }

    public function lessOrEqual($expected, string $message = ''): self
    {
        return $this->lessThanOrEqual($expected, $message);
    }

    public function match(string $pattern, string $message = ''): self
    {
        return $this->matchesRegularExpression($pattern, $message);
    }

    public function notMatch(string $pattern, string $message = ''): self
    {
        return $this->doesNotMatchRegularExpression($pattern, $message);
    }

    public function xmlFileNotToFile($expectedFile, string $message = ''): self
    {
        return $this->xmlFileNotEqualsXmlFile($expectedFile, $message);
    }

    public function xmlFileToFile($expectedFile, string $message = ''): self
    {
        return $this->xmlFileEqualsXmlFile($expectedFile, $message);
    }

    public function xmlStringNotToFile($expectedFile, string $message = ''): self
    {
        return $this->xmlStringNotEqualsXmlFile($expectedFile, $message);
    }

    public function xmlStringNotToString($expectedXml, string $message = ''): self
    {
        return $this->xmlStringNotEqualsXmlString($expectedXml, $message);
    }

    public function xmlStringToFile($expectedFile, string $message = ''): self
    {
        return $this->xmlStringEqualsXmlFile($expectedFile, $message);
    }

    public function xmlStringToString($expectedXml, string $message = ''): self
    {
        return $this->xmlStringEqualsXmlString($expectedXml, $message);
    }
}
