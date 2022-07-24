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
     * @param mixed $needle
     */
    public function containsEquals($needle, string $message = ''): self
    {
        Assert::assertContainsEquals($needle, $this->actual, $message);

        return $this;
    }

    /**
     * @param mixed $needle
     */
    public function notContainsEquals($needle, string $message = ''): self
    {
        Assert::assertNotContainsEquals($needle, $this->actual, $message);

        return $this;
    }

    public function fileEqualsCanonicalizing(string $expected, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertFileEqualsCanonicalizing($expected, $actual, $message);

        return $this;
    }

    public function fileNotEqualsCanonicalizing(string $expected, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertFileNotEqualsCanonicalizing($expected, $actual, $message);

        return $this;
    }

    public function fileEqualsIgnoringCase(string $expected, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertFileEqualsIgnoringCase($expected, $actual, $message);

        return $this;
    }

    public function fileNotEqualsIgnoringCase(string $expected, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertFileNotEqualsIgnoringCase($expected, $actual, $message);

        return $this;
    }

    public function stringEqualsFileCanonicalizing(string $expectedFile, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertStringEqualsFileCanonicalizing($expectedFile, $actual, $message);

        return $this;
    }

    public function stringNotEqualsFileCanonicalizing(string $expectedFile, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertStringNotEqualsFileCanonicalizing($expectedFile, $actual, $message);

        return $this;
    }

    public function stringEqualsFileIgnoringCase(string $expectedFile, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertStringEqualsFileIgnoringCase($expectedFile, $actual, $message);

        return $this;
    }

    public function stringNotEqualsFileIgnoringCase(string $expectedFile, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertStringNotEqualsFileIgnoringCase($expectedFile, $actual, $message);

        return $this;
    }

    public function directoryDoesNotExist(string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertDirectoryDoesNotExist($actual, $message);

        return $this;
    }

    public function directoryIsNotReadable(string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertDirectoryIsNotReadable($actual, $message);

        return $this;
    }

    public function directoryIsNotWritable(string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertDirectoryIsNotWritable($actual, $message);

        return $this;
    }

    public function fileDoesNotExist(string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertFileDoesNotExist($actual, $message);

        return $this;
    }

    public function fileIsNotReadable(string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertFileIsNotReadable($actual, $message);

        return $this;
    }

    public function fileIsNotWritable(string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertFileIsNotWritable($actual, $message);

        return $this;
    }

    public function isNotReadable(string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertIsNotReadable($actual, $message);

        return $this;
    }

    public function isNotWritable(string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertIsNotWritable($actual, $message);

        return $this;
    }

    public function matchesRegularExpression(string $pattern, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertMatchesRegularExpression($pattern, $actual, $message);

        return $this;
    }

    public function doesNotMatchRegularExpression(string $pattern, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        Assert::assertDoesNotMatchRegularExpression($pattern, $actual, $message);

        return $this;
    }

    public function isClosedResource(string $message = ''): self
    {
        Assert::assertIsClosedResource($this->actual, $message);

        return $this;
    }

    public function isNotClosedResource(string $message = ''): self
    {
        Assert::assertIsNotClosedResource($this->actual, $message);

        return $this;
    }

    public function objectEquals(object $expected, string $method = 'equals', string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'object');

        Assert::assertObjectEquals($expected, $actual, $method, $message);

        return $this;
    }

    /**
     * Asserts that array is list.
     *
     * Reference:
     * - https://github.com/sebastianbergmann/phpunit/pull/4818
     * - https://github.com/sebastianbergmann/phpunit/commit/3d90cfe294cf1c7f331e2bef77ff4ad8949446fa
     */
    public function arrayIsList(string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'array');

        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '10.0', '<')) {
            Assert::assertThat($this->actual, new ArrayIsList, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertArrayIsList($actual, $message);

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
        $actual = Validator::actualValue($this->actual, 'string');

        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '10.0', '<')) {
            Assert::assertThat(
                Str::normalizeLineEndings($actual),
                new StringContains(Str::normalizeLineEndings($needle), false),
                $message
            );

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertStringContainsStringIgnoringLineEndings($needle, $actual, $message);

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
        $actual = Validator::actualValue($this->actual, 'string');

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

        Assert::assertStringEqualsStringIgnoringLineEndings($expected, $actual, $message);

        return $this;
    }
}
