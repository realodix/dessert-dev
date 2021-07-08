<?php

namespace Realodix\NextProject\BddStyles;

use PHPUnit\Framework\Assert as PHPUnit;
use PHPUnit\Runner\Version as PHPUnitVersion;
use Realodix\NextProject\Expect;

class BddString extends Expect
{
    public function __construct(string $string)
    {
        parent::__construct($string);
    }

    public function notToContainString(string $needle, string $message = ''): self
    {
        PHPUnit::assertStringNotContainsString($needle, $this->actual, $message);

        return $this;
    }

    public function notToContainStringIgnoringCase(string $needle, string $message = ''): self
    {
        PHPUnit::assertStringNotContainsStringIgnoringCase($needle, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that a string ends not with a given suffix.
     *
     * @param string $suffix
     * @param string $message
     *
     * @return self
     */
    public function notToEndWith(string $suffix, string $message = ''): self
    {
        PHPUnit::assertStringEndsNotWith($suffix, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that the contents of a string is not equal to the contents of a file.
     *
     * @param string $expectedFile
     * @param string $message
     *
     * @return self
     */
    public function notToEqualFile(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertStringNotEqualsFile($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that the contents of a string is not equal to the contents of a file (canonicalizing).
     *
     * @param string $expectedFile
     * @param string $message
     *
     * @return self
     */
    public function notToEqualFileCanonicalizing(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertStringNotEqualsFileCanonicalizing($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that the contents of a string is not equal to the contents of a file (ignoring case).
     *
     * @param string $expectedFile
     * @param string $message
     *
     * @return self
     */
    public function notToEqualFileIgnoringCase(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertStringNotEqualsFileIgnoringCase($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that a string does not match a given format string.
     *
     * @param mixed  $format
     * @param string $message
     *
     * @return self
     */
    public function notToMatchFormat($format, string $message = ''): self
    {
        PHPUnit::assertStringNotMatchesFormat($format, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that a string does not match a given format string.
     *
     * @param string $formatFile
     * @param string $message
     *
     * @return self
     */
    public function notToMatchFormatFile(string $formatFile, string $message = ''): self
    {
        PHPUnit::assertStringNotMatchesFormatFile($formatFile, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that a string does not match a given regular expression.
     *
     * @param string $pattern
     * @param string $message
     *
     * @return self
     */
    public function notToMatchRegExp(string $pattern, string $message = ''): self
    {
        PHPUnit::assertDoesNotMatchRegularExpression($pattern, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that a string starts not with a given prefix.
     *
     * @param string $prefix
     * @param string $message
     *
     * @return self
     */
    public function notToStartWith(string $prefix, string $message = ''): self
    {
        PHPUnit::assertStringStartsNotWith($prefix, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that a string is a valid JSON string.
     *
     * @param string $message
     *
     * @return self
     */
    public function toBeJson(string $message = ''): self
    {
        PHPUnit::assertJson($this->actual, $message);

        return $this;
    }

    public function toContainString(string $needle, string $message = ''): self
    {
        PHPUnit::assertStringContainsString($needle, $this->actual, $message);

        return $this;
    }

    public function toContainStringIgnoringCase($needle, string $message = ''): self
    {
        PHPUnit::assertStringContainsStringIgnoringCase($needle, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that a string ends with a given suffix.
     *
     * @param string $suffix
     * @param string $message
     *
     * @return self
     */
    public function toEndWith(string $suffix, string $message = ''): self
    {
        PHPUnit::assertStringEndsWith($suffix, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that the contents of a string is equal to the contents of a file.
     *
     * @param string $expectedFile
     * @param string $message
     *
     * @return self
     */
    public function toEqualFile(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertStringEqualsFile($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that the contents of a string is equal to the contents of a file (canonicalizing).
     *
     * @param string $expectedFile
     * @param string $message
     *
     * @return self
     */
    public function toEqualFileCanonicalizing(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertStringEqualsFileCanonicalizing($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that the contents of a string is equal to the contents of a file (ignoring case).
     *
     * @param string $expectedFile
     * @param string $message
     *
     * @return self
     */
    public function toEqualFileIgnoringCase(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertStringEqualsFileIgnoringCase($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that a string matches a given format string.
     *
     * @param string $format
     * @param string $message
     *
     * @return self
     */
    public function toMatchFormat(string $format, string $message = ''): self
    {
        PHPUnit::assertStringMatchesFormat($format, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that a string matches a given format file.
     *
     * @param string $formatFile
     * @param string $message
     *
     * @return self
     */
    public function toMatchFormatFile(string $formatFile, string $message = ''): self
    {
        PHPUnit::assertStringMatchesFormatFile($formatFile, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that a string matches a given regular expression.
     *
     * @param string $pattern
     * @param string $message
     *
     * @return self
     */
    public function toMatchRegExp(string $pattern, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            PHPUnit::assertRegExp($pattern, $this->actual, $message);

            return $this;
        }

        PHPUnit::assertMatchesRegularExpression($pattern, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that a string starts with a given prefix.
     *
     * @param string $prefix
     * @param string $message
     *
     * @return self
     */
    public function toStartWith(string $prefix, string $message = ''): self
    {
        PHPUnit::assertStringStartsWith($prefix, $this->actual, $message);

        return $this;
    }
}
