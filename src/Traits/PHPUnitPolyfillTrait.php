<?php

namespace Realodix\Dessert\Traits;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\{IsEqual, StringContains};
use PHPUnit\Runner\Version;
use Realodix\Dessert\Support\Constraint\ArrayIsList;
use Realodix\Dessert\Support\{Str, Validator};

trait PHPUnitPolyfillTrait
{
    /**
     * Asserts that array is list.
     *
     * Reference:
     * - https://github.com/sebastianbergmann/phpunit/pull/4818
     * - https://github.com/sebastianbergmann/phpunit/commit/3d90cfe294cf1c7f331e2bef77ff4ad8949446fa
     */
    public function arrayIsList(string $message = ''): self
    {
        Validator::actualValue($this->actual, 'array');

        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '10.0', '<')) {
            Assert::assertThat($this->actual, new ArrayIsList, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertArrayIsList($this->actual, $message);

        return $this;
    }

    /**
     * Asserts string contains string (ignoring line endings).
     *
     * Reference:
     * - https://github.com/sebastianbergmann/phpunit/issues/4641
     * - https://github.com/sebastianbergmann/phpunit/pull/4670
     * - https://github.com/sebastianbergmann/phpunit/commit/466a113264f9b76decb58932f6b8dc0336ce81fe
     */
    public function stringContainsStringIgnoringLineEndings(string $needle, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '10.0', '<')) {
            Assert::assertThat(
                Str::normalizeLineEndings($this->actual),
                new StringContains(Str::normalizeLineEndings($needle), false),
                $message
            );

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertStringContainsStringIgnoringLineEndings($needle, $this->actual, $message);

        return $this;
    }

    /**
     * Asserts that two strings equality (ignoring line endings).
     *
     * Reference:
     * - https://github.com/sebastianbergmann/phpunit/issues/4641
     * - https://github.com/sebastianbergmann/phpunit/pull/4670
     * - https://github.com/sebastianbergmann/phpunit/commit/466a113264f9b76decb58932f6b8dc0336ce81fe
     */
    public function stringEqualIgnoringLineEndings(string $expected, string $message = ''): self
    {
        Validator::actualValue($this->actual, 'string');

        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '10.0', '<')) {
            Assert::assertThat(
                Str::normalizeLineEndings($this->actual),
                new IsEqual(Str::normalizeLineEndings($expected)),
                $message
            );

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertStringEqualsStringIgnoringLineEndings($expected, $this->actual, $message);

        return $this;
    }
}
