<?php

namespace Realodix\Dessert\Traits;

use PHPUnit\Framework\Assert;
use Realodix\Dessert\Exceptions\InvalidActualValue;
use Realodix\Dessert\Support\Validator;

trait PHPUnitCustomTrait
{
    public function contains(mixed $needle, string $message = ''): self
    {
        if (! is_string($this->actual) && ! is_iterable($this->actual)) {
            throw new InvalidActualValue('string|iterable');
        }

        if (\is_string($needle) && \is_string($this->actual)) {
            Assert::assertStringContainsString($needle, $this->actual, $message);

            return $this;
        }

        Assert::assertContains($needle, $this->actual, $message);

        return $this;
    }

    public function notContains(mixed $needle, string $message = ''): self
    {
        if (! is_string($this->actual) && ! is_iterable($this->actual)) {
            throw new InvalidActualValue('string|iterable');
        }

        if (\is_string($needle) && \is_string($this->actual)) {
            Assert::assertStringNotContainsString($needle, $this->actual, $message);

            return $this;
        }

        Assert::assertNotContains($needle, $this->actual, $message);

        return $this;
    }

    public function stringEqualsFile(string $expectedFile, string $message = ''): self
    {
        if (! is_string($this->actual)) {
            throw new InvalidActualValue('string');
        }

        if (Validator::isJson($this->actual)) {
            Assert::assertJsonStringEqualsJsonFile($expectedFile, $this->actual, $message);

            return $this;
        }

        if (Validator::isXml($this->actual)) {
            Assert::assertXmlStringEqualsXmlFile($expectedFile, $this->actual, $message);

            return $this;
        }

        Assert::assertStringEqualsFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function stringNotEqualsFile(string $expectedFile, string $message = ''): self
    {
        if (! is_string($this->actual)) {
            throw new InvalidActualValue('string');
        }

        if (Validator::isJson($this->actual)) {
            Assert::assertJsonStringNotEqualsJsonFile($expectedFile, $this->actual, $message);

            return $this;
        }

        if (Validator::isXml($this->actual)) {
            Assert::assertXmlStringNotEqualsXmlFile($expectedFile, $this->actual, $message);

            return $this;
        }

        Assert::assertStringNotEqualsFile($expectedFile, $this->actual, $message);

        return $this;
    }
}
