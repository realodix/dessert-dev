<?php

namespace Realodix\NextProject\Traits;

use PHPUnit\Framework\Assert as PHPUnit;
use PHPUnit\Runner\Version as PHPUnitVersion;

trait AssertStringTrait
{
    public function doesNotMatchRegularExpression($pattern, string $message = ''): self
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
     * Verifies that two variables are equal (ignoring case).
     *
     * @param mixed  $expected
     * @param string $message
     *
     * @return self
     */
    public function equalsIgnoringCase($expected, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertEquals($expected, $this->actual, $message, 0.0, 10, false, true);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertEqualsIgnoringCase($expected, $this->actual, $message);

        return $this;
    }

    public function matchesRegularExpression($pattern, string $message = ''): self
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

    /**
     * Verifies that two variables are not equal (ignoring case).
     *
     * @param mixed  $expected
     * @param string $message
     *
     * @return self
     */
    public function notEqualsIgnoringCase($expected, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotEquals($expected, $this->actual, $message, 0.0, 10, false, true);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertNotEqualsIgnoringCase($expected, $this->actual, $message);

        return $this;
    }

    public function stringContainsString($needle, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            if ($needle === '') {
                PHPUnit::assertSame($needle, $needle, $message);

                return $this;
            }

            PHPUnit::assertContains($needle, $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertStringContainsString($needle, $this->actual, $message);

        return $this;
    }

    public function stringContainsStringIgnoringCase($needle, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            if ($needle === '') {
                PHPUnit::assertSame($needle, $needle, $message);

                return $this;
            }

            PHPUnit::assertContains($needle, $this->actual, $message, true);

            return $this;
            // @codeCoverageIgnoreEnd
        }

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

    public function stringEqualsFile($expectedFile, string $message = ''): self
    {
        PHPUnit::assertStringEqualsFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function stringEqualsFileCanonicalizing($expectedFile, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '8.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertStringEqualsFile($expectedFile, $this->actual, $message, true);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertStringEqualsFileCanonicalizing($expectedFile, $this->actual, $message);

        return $this;
    }

    public function stringEqualsFileIgnoringCase($expectedFile, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '8.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertStringEqualsFile($expectedFile, $this->actual, $message, false, true);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertStringEqualsFileIgnoringCase($expectedFile, $this->actual, $message);

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

    public function stringNotContainsString($needle, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            if ($needle === '') {
                if ($message === '') {
                    $message = "Failed asserting that '{$this->actual}' does not contain \"{$needle}\".";
                }

                PHPUnit::fail($message);

                return $this;
            }

            PHPUnit::assertNotContains($needle, $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertStringNotContainsString($needle, $this->actual, $message);

        return $this;
    }

    public function stringNotContainsStringIgnoringCase($needle, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            if ($needle === '') {
                if ($message === '') {
                    $message = "Failed asserting that '{$this->actual}' does not contain \"{$needle}\".";
                }

                PHPUnit::fail($message);

                return $this;
            }

            PHPUnit::assertNotContains($needle, $this->actual, $message, true);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertStringNotContainsStringIgnoringCase($needle, $this->actual, $message);

        return $this;
    }

    public function stringNotEqualsFile($expectedFile, string $message = ''): self
    {
        PHPUnit::assertStringNotEqualsFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function stringNotEqualsFileCanonicalizing($expectedFile, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '8.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertStringNotEqualsFile($expectedFile, $this->actual, $message, true);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertStringNotEqualsFileCanonicalizing($expectedFile, $this->actual, $message);

        return $this;
    }

    public function stringNotEqualsFileIgnoringCase($expectedFile, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '8.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertStringNotEqualsFile($expectedFile, $this->actual, $message, false, true);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertStringNotEqualsFileIgnoringCase($expectedFile, $this->actual, $message);

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
