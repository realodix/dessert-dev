<?php

namespace Realodix\NextProject\Traits;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\Constraint\StringContains;
use PHPUnit\Runner\Version;
use Realodix\NextProject\Support\Constraint\ArrayIsList;
use Realodix\NextProject\Support\Constraint\ObjectEquals;
use Realodix\NextProject\Support\Str;
use Realodix\NextProject\Support\Validator;

trait PHPUnitPolyfillTrait
{
    /**
     * @param mixed $needle
     */
    public function containsEquals($needle, string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '8.1', '<')) {
            Assert::assertContains($needle, $this->actual, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertContainsEquals($needle, $this->actual, $message);

        return $this;
    }

    /**
     * @param mixed $needle
     */
    public function notContainsEquals($needle, string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '8.1', '<')) {
            Assert::assertNotContains($needle, $this->actual, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertNotContainsEquals($needle, $this->actual, $message);

        return $this;
    }

    public function fileEqualsCanonicalizing(string $expected, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '8.5', '<')) {
            Assert::assertFileEquals($expected, $actual, $message, true);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertFileEqualsCanonicalizing($expected, $actual, $message);

        return $this;
    }

    public function fileNotEqualsCanonicalizing(string $expected, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '8.5', '<')) {
            Assert::assertFileNotEquals($expected, $actual, $message, true);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertFileNotEqualsCanonicalizing($expected, $actual, $message);

        return $this;
    }

    public function fileEqualsIgnoringCase(string $expected, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '8.5', '<')) {
            Assert::assertFileEquals($expected, $actual, $message, false, true);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertFileEqualsIgnoringCase($expected, $actual, $message);

        return $this;
    }

    public function fileNotEqualsIgnoringCase(string $expected, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '8.5', '<')) {
            Assert::assertFileNotEquals($expected, $actual, $message, false, true);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertFileNotEqualsIgnoringCase($expected, $actual, $message);

        return $this;
    }

    public function stringEqualsFileCanonicalizing(string $expectedFile, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '8.5', '<')) {
            Assert::assertStringEqualsFile($expectedFile, $actual, $message, true);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertStringEqualsFileCanonicalizing($expectedFile, $actual, $message);

        return $this;
    }

    public function stringNotEqualsFileCanonicalizing(string $expectedFile, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '8.5', '<')) {
            Assert::assertStringNotEqualsFile($expectedFile, $actual, $message, true);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertStringNotEqualsFileCanonicalizing($expectedFile, $actual, $message);

        return $this;
    }

    public function stringEqualsFileIgnoringCase(string $expectedFile, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '8.5', '<')) {
            Assert::assertStringEqualsFile($expectedFile, $actual, $message, false, true);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertStringEqualsFileIgnoringCase($expectedFile, $actual, $message);

        return $this;
    }

    public function stringNotEqualsFileIgnoringCase(string $expectedFile, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '8.5', '<')) {
            Assert::assertStringNotEqualsFile($expectedFile, $actual, $message, false, true);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertStringNotEqualsFileIgnoringCase($expectedFile, $actual, $message);

        return $this;
    }

    public function directoryDoesNotExist(string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '9.1', '<')) {
            Assert::assertDirectoryNotExists($actual, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertDirectoryDoesNotExist($actual, $message);

        return $this;
    }

    public function directoryIsNotReadable(string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '9.1', '<')) {
            Assert::assertDirectoryNotIsReadable($actual, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertDirectoryIsNotReadable($actual, $message);

        return $this;
    }

    public function directoryIsNotWritable(string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '9.1', '<')) {
            Assert::assertDirectoryNotIsWritable($actual, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertDirectoryIsNotWritable($actual, $message);

        return $this;
    }

    public function fileDoesNotExist(string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '9.1', '<')) {
            Assert::assertFileNotExists($actual, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertFileDoesNotExist($actual, $message);

        return $this;
    }

    public function fileIsNotReadable(string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '9.1', '<')) {
            Assert::assertFileNotIsReadable($actual, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertFileIsNotReadable($actual, $message);

        return $this;
    }

    public function fileIsNotWritable(string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '9.1', '<')) {
            Assert::assertFileNotIsWritable($actual, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertFileIsNotWritable($actual, $message);

        return $this;
    }

    public function isNotReadable(string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '9.1', '<')) {
            Assert::assertNotIsReadable($actual, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertIsNotReadable($actual, $message);

        return $this;
    }

    public function isNotWritable(string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '9.1', '<')) {
            Assert::assertNotIsWritable($actual, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertIsNotWritable($actual, $message);

        return $this;
    }

    public function matchesRegularExpression(string $pattern, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '9.1', '<')) {
            Assert::assertRegExp($pattern, $actual, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertMatchesRegularExpression($pattern, $actual, $message);

        return $this;
    }

    public function doesNotMatchRegularExpression(string $pattern, string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'string');

        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '9.1', '<')) {
            Assert::assertNotRegExp($pattern, $actual, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertDoesNotMatchRegularExpression($pattern, $actual, $message);

        return $this;
    }

    public function isClosedResource(string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '9.3', '<')) {
            if ($message === '') {
                $message = sprintf(
                    'Failed asserting that %s is of type "resource (closed)"',
                    var_export($this->actual, true)
                );
            }

            Assert::assertTrue(
                Validator::isClosedResource($this->actual),
                $message
            );

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertIsClosedResource($this->actual, $message);

        return $this;
    }

    public function isNotClosedResource(string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '9.3', '<')) {
            if ($message === '') {
                $message = sprintf(
                    'Failed asserting that %s is not of type "resource (closed)"',
                    var_export($this->actual, true)
                );
            }

            Assert::assertFalse(
                Validator::isClosedResource($this->actual),
                $message
            );

            return $this;
        }
        // @codeCoverageIgnoreEnd

        Assert::assertIsNotClosedResource($this->actual, $message);

        return $this;
    }

    /**
     * @param object $expected
     */
    public function objectEquals($expected, string $method = 'equals', string $message = ''): self
    {
        $actual = Validator::actualValue($this->actual, 'object');
        // Validate object parameter type in function argument (PHP < 7.2)
        $expected = Validator::expectedValue($expected, 'object');

        // @codeCoverageIgnoreStart
        if (version_compare(Version::series(), '9.4', '<')) {
            $constraint = new ObjectEquals($expected, $method);

            Assert::assertThat($actual, $constraint, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

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
