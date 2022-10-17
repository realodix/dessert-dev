<?php

namespace Realodix\Dessert\Traits;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\Constraint\StringContains;
use PHPUnit\Runner\Version;
use Realodix\Dessert\Exceptions\InvalidActualValue;
use Realodix\Dessert\Support\Constraint\IsList;
use Realodix\Dessert\Support\Str;

trait PHPUnitPolyfillTrait
{
    /**
     * Asserts that array is list.
     *
     * Reference:
     * - https://github.com/sebastianbergmann/phpunit/pull/4818
     * - https://github.com/sebastianbergmann/phpunit/commit/3d90cfe294cf1c7f331e2bef77ff4ad8949446fa
     * - https://github.com/sebastianbergmann/phpunit/commit/e04a947baf8d9b800ac8a1223f3be0f090cacf3e
     */
    public function isList(string $message = ''): self
    {
        if (! is_array($this->actual)) {
            throw new InvalidActualValue('array');
        }

        if ( \method_exists(Assert::class, 'assertIsList')) {
            Assert::assertIsList($this->actual, $message);

            return $this;
        }

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
        if (! is_string($this->actual)) {
            throw new InvalidActualValue('string');
        }

        if ( \method_exists(Assert::class, 'assertStringContainsStringIgnoringLineEndings')) {
            Assert::assertStringContainsStringIgnoringLineEndings($needle, $this->actual, $message);

            return $this;
        }


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
        if (! is_string($this->actual)) {
            throw new InvalidActualValue('string');
        }

        if ( \method_exists(Assert::class, 'assertStringEqualsStringIgnoringLineEndings')) {
            Assert::assertStringEqualsStringIgnoringLineEndings($expected, $this->actual, $message);

            return $this;
        }


    }
}
