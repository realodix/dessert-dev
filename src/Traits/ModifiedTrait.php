<?php

namespace Realodix\NextProject\Traits;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\ExpectationFailedException;
use Realodix\NextProject\Support\Arr;
use Realodix\NextProject\Support\Validator;

trait ModifiedTrait
{
    /**
     * @param int|string $key
     * @param mixed      $value
     * @param string     $message
     */
    public function arrayHasKey($key, $value = null, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'array');
        $key = Validator::expectedValue($key, 1, 'int_string');

        try {
            Assert::assertTrue(Arr::has($actual, $key), $message);
        } catch (ExpectationFailedException $exception) {
            throw new ExpectationFailedException(
                "Failed asserting that an array has the key '${key}'",
                $exception->getComparisonFailure()
            );
        }

        if (! $value === null) {
            Assert::assertEquals($value, Arr::get($actual, $key));
        }

        return $this;
    }

    /**
     * @param int|string $key
     * @param string     $message
     */
    public function arrayNotHasKey($key, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'array');
        $expected = Validator::expectedValue($key, 1, 'int_string');

        Assert::assertArrayNotHasKey($expected, $actual, $message);

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
