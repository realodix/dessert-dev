<?php

namespace Realodix\NextProject\Traits;

use PHPUnit\Framework\Assert as PHPUnit;

trait AssertJsonTrait
{
    public function json(string $message = ''): self
    {
        PHPUnit::assertJson($this->actual, $message);

        return $this;
    }

    public function jsonFileEqualsJsonFile($expectedFile, string $message = ''): self
    {
        PHPUnit::assertJsonFileEqualsJsonFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function jsonFileNotEqualsJsonFile($expectedFile, string $message = ''): self
    {
        PHPUnit::assertJsonFileNotEqualsJsonFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function jsonStringEqualsJsonFile($expectedFile, string $message = ''): self
    {
        PHPUnit::assertJsonStringEqualsJsonFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function jsonStringEqualsJsonString($expectedJson, string $message = ''): self
    {
        PHPUnit::assertJsonStringEqualsJsonString($expectedJson, $this->actual, $message);

        return $this;
    }

    public function jsonStringNotEqualsJsonFile($expectedFile, string $message = ''): self
    {
        PHPUnit::assertJsonStringNotEqualsJsonFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function jsonStringNotEqualsJsonString($expectedJson, string $message = ''): self
    {
        PHPUnit::assertJsonStringNotEqualsJsonString($expectedJson, $this->actual, $message);

        return $this;
    }
}
