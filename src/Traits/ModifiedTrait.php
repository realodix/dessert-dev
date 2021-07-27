<?php

namespace Realodix\NextProject\Traits;

use PHPUnit\Framework\Assert;
use Realodix\NextProject\Support\Validator;

trait ModifiedTrait
{
    public function contains($needle, string $message = ''): self
    {
        $haystack = $this->actual;

        if (\is_string($haystack)) {
            Assert::assertStringContainsString($needle, $haystack, $message);

            return $this;
        }

        Assert::assertContains($needle, $haystack, $message);

        return $this;
    }

    public function notContains($needle, string $message = ''): self
    {
        $haystack = $this->actual;

        if (\is_string($haystack)) {
            Assert::assertStringNotContainsString($needle, $haystack, $message);

            return $this;
        }

        Assert::assertNotContains($needle, $haystack, $message);

        return $this;
    }

    public function stringEqualsFile(string $expectedFile, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        if (Validator::isJson($actual)) {
            Assert::assertJsonStringEqualsJsonFile($expectedFile, $actual, $message);

            return $this;
        }

        if (Validator::isXml($actual)) {
            Assert::assertXmlStringEqualsXmlFile($expectedFile, $actual, $message);

            return $this;
        }

        Assert::assertStringEqualsFile($expectedFile, $actual, $message);

        return $this;
    }

    public function stringNotEqualsFile(string $expectedFile, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        if (Validator::isJson($actual)) {
            Assert::assertJsonStringNotEqualsJsonFile($expectedFile, $actual, $message);

            return $this;
        }

        if (Validator::isXml($actual)) {
            Assert::assertXmlStringNotEqualsXmlFile($expectedFile, $actual, $message);

            return $this;
        }

        Assert::assertStringNotEqualsFile($expectedFile, $actual, $message);

        return $this;
    }
}
