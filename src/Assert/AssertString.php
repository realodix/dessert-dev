<?php

namespace Realodix\NextProject\Assert;

use PHPUnit\Framework\Assert as PHPUnit;
use PHPUnit\Runner\Version as PHPUnitVersion;

class AssertString extends Assert
{
    public function __construct(string $string)
    {
        parent::__construct($string);
    }

    public function containsString(string $needle, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            if ($needle === '') {
                PHPUnit::assertSame($needle, $needle, $message);

                return $this;
            }

            PHPUnit::assertContains($needle, $this->actual, $message);

            return $this;
        }

        PHPUnit::assertStringContainsString($needle, $this->actual, $message);

        return $this;
    }

    public function containsStringIgnoringCase($needle, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            if ($needle === '') {
                PHPUnit::assertSame($needle, $needle, $message);

                return $this;
            }

            PHPUnit::assertContains($needle, $this->actual, $message, true);

            return $this;
        }

        PHPUnit::assertStringContainsStringIgnoringCase($needle, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a string does not match a given regular expression.
     *
     * @param string $pattern
     * @param string $message
     *
     * @return self
     */
    public function doesNotMatchRegularExpression(string $pattern, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            PHPUnit::assertNotRegExp($pattern, $this->actual, $message);

            return $this;
        }

        PHPUnit::assertDoesNotMatchRegularExpression($pattern, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a string ends not with a given suffix.
     *
     * @param string $suffix
     * @param string $message
     *
     * @return self
     */
    public function endsNotWith(string $suffix, string $message = ''): self
    {
        PHPUnit::assertStringEndsNotWith($suffix, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a string ends with a given suffix.
     *
     * @param string $suffix
     * @param string $message
     *
     * @return self
     */
    public function endsWith(string $suffix, string $message = ''): self
    {
        PHPUnit::assertStringEndsWith($suffix, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that the contents of a string is equal to the contents of a file.
     *
     * @param string $expectedFile
     * @param string $message
     *
     * @return self
     */
    public function equalsFile(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertStringEqualsFile($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that the contents of a string is equal to the contents of a file (canonicalizing).
     *
     * @param string $expectedFile
     * @param string $message
     *
     * @return self
     */
    public function equalsFileCanonicalizing(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertStringEqualsFileCanonicalizing($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that the contents of a string is equal to the contents of a file (ignoring case).
     *
     * @param string $expectedFile
     * @param string $message
     *
     * @return self
     */
    public function equalsFileIgnoringCase(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertStringEqualsFileIgnoringCase($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a string is a valid JSON string.
     *
     * @param string $message
     *
     * @return self
     */
    public function json(string $message = ''): self
    {
        PHPUnit::assertJson($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a string matches a given format string.
     *
     * @param string $format
     * @param string $message
     *
     * @return self
     */
    public function matchesFormat(string $format, string $message = ''): self
    {
        PHPUnit::assertStringMatchesFormat($format, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a string matches a given format file.
     *
     * @param string $formatFile
     * @param string $message
     *
     * @return self
     */
    public function matchesFormatFile(string $formatFile, string $message = ''): self
    {
        PHPUnit::assertStringMatchesFormatFile($formatFile, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a string matches a given regular expression.
     *
     * @param string $pattern
     * @param string $message
     *
     * @return self
     */
    public function matchesRegularExpression(string $pattern, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            PHPUnit::assertRegExp($pattern, $this->actual, $message);

            return $this;
        }

        PHPUnit::assertMatchesRegularExpression($pattern, $this->actual, $message);

        return $this;
    }

    public function notContainsString(string $needle, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            if ($needle === '') {
                if ($message === '') {
                    $message = "Failed asserting that '{$this->actual}' does not contain \"{$needle}\".";
                }

                PHPUnit::fail($message);

                return $this;
            }

            PHPUnit::assertNotContains($needle, $this->actual, $message);

            return $this;
        }

        PHPUnit::assertStringNotContainsString($needle, $this->actual, $message);

        return $this;
    }

    public function notContainsStringIgnoringCase(string $needle, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            if ($needle === '') {
                if ($message === '') {
                    $message = "Failed asserting that '{$this->actual}' does not contain \"{$needle}\".";
                }

                PHPUnit::fail($message);

                return $this;
            }

            PHPUnit::assertNotContains($needle, $this->actual, $message, true);

            return $this;
        }

        PHPUnit::assertStringNotContainsStringIgnoringCase($needle, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that the contents of a string is not equal to the contents of a file.
     *
     * @param string $expectedFile
     * @param string $message
     *
     * @return self
     */
    public function notEqualsFile(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertStringNotEqualsFile($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that the contents of a string is not equal to the contents of a file (canonicalizing).
     *
     * @param string $expectedFile
     * @param string $message
     *
     * @return self
     */
    public function notEqualsFileCanonicalizing(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertStringNotEqualsFileCanonicalizing($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that the contents of a string is not equal to the contents of a file (ignoring case).
     *
     * @param string $expectedFile
     * @param string $message
     *
     * @return self
     */
    public function notEqualsFileIgnoringCase(string $expectedFile, string $message = ''): self
    {
        PHPUnit::assertStringNotEqualsFileIgnoringCase($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a string does not match a given format string.
     *
     * @param mixed  $format
     * @param string $message
     *
     * @return self
     */
    public function notMatchesFormat($format, string $message = ''): self
    {
        PHPUnit::assertStringNotMatchesFormat($format, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a string does not match a given format string.
     *
     * @param string $formatFile
     * @param string $message
     *
     * @return self
     */
    public function notMatchesFormatFile(string $formatFile, string $message = ''): self
    {
        PHPUnit::assertStringNotMatchesFormatFile($formatFile, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a string starts not with a given prefix.
     *
     * @param string $prefix
     * @param string $message
     *
     * @return self
     */
    public function startsNotWith(string $prefix, string $message = ''): self
    {
        PHPUnit::assertStringStartsNotWith($prefix, $this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a string starts with a given prefix.
     *
     * @param string $prefix
     * @param string $message
     *
     * @return self
     */
    public function startsWith(string $prefix, string $message = ''): self
    {
        PHPUnit::assertStringStartsWith($prefix, $this->actual, $message);

        return $this;
    }
}
