<?php

namespace Realodix\Dessert\Traits;

use PHPUnit\Framework\{Assert, ExpectationFailedException};
use Realodix\Dessert\Support\{Arr, Validator};

trait PHPUnitCustomTrait
{
    /**
     * @param null|mixed $value
     */
    public function arrayHasKey(int|string $key, $value = null, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'array');

        try {
            Assert::assertTrue(Arr::has($this->actual, $key), $message);
        } catch (ExpectationFailedException $exception) {
            throw new ExpectationFailedException(
                "Failed asserting that an array has the key '{$key}'",
                $exception->getComparisonFailure()
            );
        }

        if ($value !== null) {
            Assert::assertEquals($value, Arr::get($this->actual, $key));

            return $this;
        }

        return $this;
    }

    /**
     * @param null|mixed $value
     */
    public function arrayNotHasKey(int|string $key, $value = null, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'array');

        try {
            Assert::assertFalse(Arr::has($this->actual, $key), $message);
        } catch (ExpectationFailedException $exception) {
            throw new ExpectationFailedException(
                "Failed asserting that an array has the key '{$key}'",
                $exception->getComparisonFailure()
            );
        }

        if ($value !== null) {
            Assert::assertNotEquals($value, Arr::get($this->actual, $key));

            return $this;
        }

        return $this;
    }

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
        Validator::actualValue($this->actual, 'string');

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
        Validator::actualValue($this->actual, 'string');

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
