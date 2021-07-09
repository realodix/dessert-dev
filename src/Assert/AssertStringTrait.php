<?php

namespace Realodix\NextProject\Assert;

use PHPUnit\Framework\Assert as PHPUnit;
use PHPUnit\Runner\Version as PHPUnitVersion;

trait AssertStringTrait
{
    public function stringContainsString($needle, string $message = ''): self
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

    public function stringContainsStringIgnoringCase($needle, string $message = ''): self
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
        PHPUnit::assertStringEqualsFileCanonicalizing($expectedFile, $this->actual, $message);

        return $this;
    }

    public function stringEqualsFileIgnoringCase($expectedFile, string $message = ''): self
    {
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

    public function stringNotContainsStringIgnoringCase($needle, string $message = ''): self
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

    public function stringNotEqualsFile($expectedFile, string $message = ''): self
    {
        PHPUnit::assertStringNotEqualsFile($expectedFile, $this->actual, $message);

        return $this;
    }

    public function stringNotEqualsFileCanonicalizing($expectedFile, string $message = ''): self
    {
        PHPUnit::assertStringNotEqualsFileCanonicalizing($expectedFile, $this->actual, $message);

        return $this;
    }

    public function stringNotEqualsFileIgnoringCase($expectedFile, string $message = ''): self
    {
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
