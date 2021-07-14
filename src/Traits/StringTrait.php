<?php

namespace Realodix\NextProject\Traits;

use PHPUnit\Framework\Assert as PHPUnit;
use PHPUnit\Runner\Version as PHPUnitVersion;

trait StringTrait
{
    public function contains($needle, string $message = ''): self
    {
        if (is_string($this->actual)) {
            PHPUnit::assertStringContainsString($needle, $this->actual, $message);
        } else {
            PHPUnit::assertContains($needle, $this->actual, $message);
        }

        return $this;
    }

    public function containsOnly($type, $isNativeType = null, string $message = ''): self
    {
        PHPUnit::assertContainsOnly($type, $this->actual, $isNativeType, $message);

        return $this;
    }

    /**
     * Asserts that a string does not match a given regular expression.
     *
     * @param string $pattern
     * @param string $message
     */
    public function doesNotMatchRegularExpression(string $pattern, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotRegExp($pattern, $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertDoesNotMatchRegularExpression($pattern, $this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a string is a valid JSON string.
     *
     * @param string $message
     */
    public function json(string $message = ''): self
    {
        PHPUnit::assertJson($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a string matches a given regular expression.
     *
     * @param string $pattern
     * @param string $message
     */
    public function matchesRegularExpression(string $pattern, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertRegExp($pattern, $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertMatchesRegularExpression($pattern, $this->actual, $message);

        return $this;
    }

    public function notContains($needle, string $message = ''): self
    {
        if (is_string($this->actual)) {
            PHPUnit::assertStringNotContainsString($needle, $this->actual, $message);
        } else {
            PHPUnit::assertNotContains($needle, $this->actual, $message);
        }

        return $this;
    }

    public function notContainsOnly($type, $isNativeType = null, string $message = ''): self
    {
        PHPUnit::assertNotContainsOnly($type, $this->actual, $isNativeType, $message);

        return $this;
    }

    public function stringContainsString(string $needle, string $message = ''): self
    {
        PHPUnit::assertStringContainsString($needle, $this->actual, $message);

        return $this;
    }

    public function stringContainsStringIgnoringCase(string $needle, string $message = ''): self
    {
        PHPUnit::assertStringContainsStringIgnoringCase($needle, $this->actual, $message);

        return $this;
    }

    public function stringEndsNotWith($suffix, string $message = ''): self
    {
        PHPUnit::assertStringEndsNotWith($suffix, $this->actual, $message);

        return $this;
    }

    public function stringEndsWith($suffix, string $message = ''): self
    {
        PHPUnit::assertStringEndsWith($suffix, $this->actual, $message);

        return $this;
    }

    public function stringMatchesFormat($format, string $message = ''): self
    {
        PHPUnit::assertStringMatchesFormat($format, $this->actual, $message);

        return $this;
    }

    public function stringMatchesFormatFile($formatFile, string $message = ''): self
    {
        PHPUnit::assertStringMatchesFormatFile($formatFile, $this->actual, $message);

        return $this;
    }

    public function stringNotContainsString(string $needle, string $message = ''): self
    {
        PHPUnit::assertStringNotContainsString($needle, $this->actual, $message);

        return $this;
    }

    public function stringNotContainsStringIgnoringCase(string $needle, string $message = ''): self
    {
        PHPUnit::assertStringNotContainsStringIgnoringCase($needle, $this->actual, $message);

        return $this;
    }

    public function stringNotMatchesFormat($format, string $message = ''): self
    {
        PHPUnit::assertStringNotMatchesFormat($format, $this->actual, $message);

        return $this;
    }

    public function stringNotMatchesFormatFile($formatFile, string $message = ''): self
    {
        PHPUnit::assertStringNotMatchesFormatFile($formatFile, $this->actual, $message);

        return $this;
    }

    public function stringStartsNotWith($prefix, string $message = ''): self
    {
        PHPUnit::assertStringStartsNotWith($prefix, $this->actual, $message);

        return $this;
    }

    public function stringStartsWith($prefix, string $message = ''): self
    {
        PHPUnit::assertStringStartsWith($prefix, $this->actual, $message);

        return $this;
    }
}
