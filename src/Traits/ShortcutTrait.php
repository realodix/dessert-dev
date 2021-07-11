<?php

namespace Realodix\NextProject\Traits;

trait ShortcutTrait
{
    public function dirDNE(string $message = ''): self
    {
        return $this->directoryDoesNotExist($message);
    }

    public function dirEx(string $message = ''): self
    {
        return $this->directoryExists($this->actual, $message);
    }

    public function dirINR(string $message = ''): self
    {
        return $this->directoryIsNotReadable($message);
    }

    public function dirINW(string $message = ''): self
    {
        return $this->directoryIsNotWritable($message);
    }

    public function dirIR(string $message = ''): self
    {
        return $this->directoryIsReadable($message);
    }

    public function dirIW(string $message = ''): self
    {
        return $this->directoryIsWritable($message);
    }

    public function greater($expected, string $message = ''): self
    {
        return $this->greaterThan($expected, $message);
    }

    public function greaterEqual($expected, string $message = ''): self
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

    public function jsonFileEJF($expectedFile, string $message = ''): self
    {
        return $this->jsonFileEqualsJsonFile($expectedFile, $message);
    }

    public function jsonFileNEJF($expectedFile, string $message = ''): self
    {
        return $this->jsonFileNotEqualsJsonFile($expectedFile, $message);
    }

    public function jsonStringEJF($expectedFile, string $message = ''): self
    {
        return $this->jsonStringEqualsJsonFile($expectedFile, $message);
    }

    public function jsonStringEJS($expectedJson, string $message = ''): self
    {
        return $this->jsonStringEqualsJsonString($expectedJson, $message);
    }

    public function jsonStringNEJF($expectedFile, string $message = ''): self
    {
        return $this->jsonStringNotEqualsJsonFile($expectedFile, $message);
    }

    public function jsonStringNEJS($expectedJson, string $message = ''): self
    {
        return $this->jsonStringNotEqualsJsonString($expectedJson, $message);
    }

    public function less($expected, string $message = ''): self
    {
        return $this->lessThan($expected, $message);
    }

    public function lessEqual($expected, string $message = ''): self
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

    public function xmlFileEXF($expectedFile, string $message = ''): self
    {
        return $this->xmlFileEqualsXmlFile($expectedFile, $message);
    }

    public function xmlFileNEXF($expectedFile, string $message = ''): self
    {
        return $this->xmlFileNotEqualsXmlFile($expectedFile, $message);
    }

    public function xmlStringEXF($expectedFile, string $message = ''): self
    {
        return $this->xmlStringEqualsXmlFile($expectedFile, $message);
    }

    public function xmlStringEXS($expectedXml, string $message = ''): self
    {
        return $this->xmlStringEqualsXmlString($expectedXml, $message);
    }

    public function xmlStringNEXF($expectedFile, string $message = ''): self
    {
        return $this->xmlStringNotEqualsXmlFile($expectedFile, $message);
    }

    public function xmlStringNEXS($expectedXml, string $message = ''): self
    {
        return $this->xmlStringNotEqualsXmlString($expectedXml, $message);
    }
}
