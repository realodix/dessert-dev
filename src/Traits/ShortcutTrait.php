<?php

namespace Realodix\NextProject\Traits;

trait ShortcutTrait
{
    public function dirDoesNotExist(string $message = ''): self
    {
        return $this->directoryDoesNotExist($message);
    }

    public function dirExists(string $message = ''): self
    {
        return $this->directoryExists($this->actual, $message);
    }

    public function dirIsNotReadable(string $message = ''): self
    {
        return $this->directoryIsNotReadable($message);
    }

    public function dirIsNotWritable(string $message = ''): self
    {
        return $this->directoryIsNotWritable($message);
    }

    public function dirIsReadable(string $message = ''): self
    {
        return $this->directoryIsReadable($message);
    }

    public function dirIsWritable(string $message = ''): self
    {
        return $this->directoryIsWritable($message);
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

    public function jsonFileEqualsFile($expectedFile, string $message = ''): self
    {
        return $this->jsonFileNotEqualsJsonFile($expectedFile, $message);
    }

    public function jsonFileNotEqualsFile($expectedFile, string $message = ''): self
    {
        return $this->jsonFileNotEqualsJsonFile($expectedFile, $message);
    }

    public function jsonStringEqualsFile($expectedFile, string $message = ''): self
    {
        return $this->jsonStringEqualsJsonFile($expectedFile, $message);
    }

    public function jsonStringEqualsString($expectedJson, string $message = ''): self
    {
        return $this->jsonStringEqualsJsonString($expectedJson, $message);
    }

    public function jsonStringNotEqualsFile($expectedFile, string $message = ''): self
    {
        return $this->jsonStringNotEqualsJsonFile($expectedFile, $message);
    }

    public function jsonStringNotEqualsString($expectedJson, string $message = ''): self
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
}
