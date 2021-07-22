<?php

namespace Realodix\NextProject\Traits;

use PHPUnit\Framework\Assert as PHPUnit;
use PHPUnit\Runner\Version as PHPUnitVersion;
use Realodix\NextProject\Support\Constraint\ObjectEquals;
use Realodix\NextProject\Support\Validator;

trait PolyfillTrait
{
    public function containsEquals($needle, string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(PHPUnitVersion::series(), '8.1', '<')) {
            PHPUnit::assertContains($needle, $this->actual, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        PHPUnit::assertContainsEquals($needle, $this->actual, $message);

        return $this;
    }

    public function notContainsEquals($needle, string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(PHPUnitVersion::series(), '8.1', '<')) {
            PHPUnit::assertNotContains($needle, $this->actual, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        PHPUnit::assertNotContainsEquals($needle, $this->actual, $message);

        return $this;
    }

    /**
     * Introduced in PHPUnit 8.5.0 as alternatives to using assertFileEquals() with these
     * optional parameters.
     *
     * assertFileEquals() optional parameters status:
     * - Deprecated: PHPUnit 8.5.0
     * - Removed: PHPUnit 9.0.0
     *
     * @param string $expected
     * @param string $message
     */
    public function fileEqualsCanonicalizing(string $expected, string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(PHPUnitVersion::series(), '8.5', '<')) {
            PHPUnit::assertFileEquals($expected, $this->actual, $message, true);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        PHPUnit::assertFileEqualsCanonicalizing($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Introduced in PHPUnit 8.5.0 as alternatives to using assertFileNotEquals() with
     * these optional parameters.
     *
     * assertFileNotEquals() optional parameters status:
     * - Deprecated: PHPUnit 8.5.0
     * - Removed: PHPUnit 9.0.0
     *
     * @param string $expected
     * @param string $message
     */
    public function fileNotEqualsCanonicalizing(string $expected, string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(PHPUnitVersion::series(), '8.5', '<')) {
            PHPUnit::assertFileNotEquals($expected, $this->actual, $message, true);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        PHPUnit::assertFileNotEqualsCanonicalizing($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Introduced in PHPUnit 8.5.0 as alternatives to using assertFileEquals() with these
     * optional parameters.
     *
     * assertFileEquals() optional parameters status:
     * - Deprecated: PHPUnit 8.5.0
     * - Removed: PHPUnit 9.0.0
     *
     * @param string $expected
     * @param string $message
     */
    public function fileEqualsIgnoringCase(string $expected, string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(PHPUnitVersion::series(), '8.5', '<')) {
            PHPUnit::assertFileEquals($expected, $this->actual, $message, false, true);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        PHPUnit::assertFileEqualsIgnoringCase($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Introduced in PHPUnit 8.5.0 as alternatives to using assertFileNotEquals() with
     * these optional parameters.
     *
     * assertFileNotEquals() optional parameters status:
     * - Deprecated: PHPUnit 8.5.0
     * - Removed: PHPUnit 9.0.0
     *
     * @param string $expected
     * @param string $message
     */
    public function fileNotEqualsIgnoringCase(string $expected, string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(PHPUnitVersion::series(), '8.5', '<')) {
            PHPUnit::assertFileNotEquals($expected, $this->actual, $message, false, true);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        PHPUnit::assertFileNotEqualsIgnoringCase($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Introduced in PHPUnit 8.5.0 as alternatives to using assertStringEqualsFile() with
     * these optional parameters.
     *
     * assertStringEqualsFile() optional parameters status:
     * - Deprecated: PHPUnit 8.5.0
     * - Removed: PHPUnit 9.0.0
     *
     * @param string $expectedFile
     * @param string $message
     */
    public function stringEqualsFileCanonicalizing(string $expectedFile, string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(PHPUnitVersion::series(), '8.5', '<')) {
            PHPUnit::assertStringEqualsFile($expectedFile, $this->actual, $message, true);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        PHPUnit::assertStringEqualsFileCanonicalizing($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * Introduced in PHPUnit 8.5.0 as alternatives to using assertStringNotEqualsFile()
     * with these optional parameters.
     *
     * assertStringNotEqualsFile() optional parameters status:
     * - Deprecated: PHPUnit 8.5.0
     * - Removed: PHPUnit 9.0.0
     *
     * @param string $expectedFile
     * @param string $message
     */
    public function stringNotEqualsFileCanonicalizing(string $expectedFile, string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(PHPUnitVersion::series(), '8.5', '<')) {
            PHPUnit::assertStringNotEqualsFile($expectedFile, $this->actual, $message, true);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        PHPUnit::assertStringNotEqualsFileCanonicalizing($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * Introduced in PHPUnit 8.5.0 as alternatives to using assertStringEqualsFile() with
     * these optional parameters.
     *
     * assertStringEqualsFile() optional parameters status:
     * - Deprecated: PHPUnit 8.5.0
     * - Removed: PHPUnit 9.0.0
     *
     * @param string $expectedFile
     * @param string $message
     */
    public function stringEqualsFileIgnoringCase(string $expectedFile, string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(PHPUnitVersion::series(), '8.5', '<')) {
            PHPUnit::assertStringEqualsFile($expectedFile, $this->actual, $message, false, true);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        PHPUnit::assertStringEqualsFileIgnoringCase($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * Introduced in PHPUnit 8.5.0 as alternatives to using assertStringNotEqualsFile()
     * with these optional parameters.
     *
     * assertStringNotEqualsFile() optional parameters status:
     * - Deprecated: PHPUnit 8.5.0
     * - Removed: PHPUnit 9.0.0
     *
     * @param string $expectedFile
     * @param string $message
     */
    public function stringNotEqualsFileIgnoringCase(string $expectedFile, string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(PHPUnitVersion::series(), '8.5', '<')) {
            PHPUnit::assertStringNotEqualsFile($expectedFile, $this->actual, $message, false, true);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        PHPUnit::assertStringNotEqualsFileIgnoringCase($expectedFile, $this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a directory does not exist.
     *
     * Introduced in PHPUnit 9.1.0 as alternative for Assert::assertDirectoryNotExists().
     * The original methods these new methods replace were hard deprecated in PHPUnit
     * 9.1.0 and removed in PHPUnit 10.0.0.
     *
     * Reference:
     * - https://github.com/sebastianbergmann/phpunit/issues/4067
     * - https://github.com/sebastianbergmann/phpunit/issues/4069
     *
     * @param string $message
     */
    public function directoryDoesNotExist(string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            PHPUnit::assertDirectoryNotExists($this->actual, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        PHPUnit::assertDirectoryDoesNotExist($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a directory exists and is not readable.
     *
     * Introduced in PHPUnit 9.1.0 as alternative for Assert::assertDirectoryNotIsReadable().
     * The original methods these new methods replace were hard deprecated in PHPUnit 9.1.0
     * and removed in PHPUnit 10.0.0.
     *
     * Reference:
     * - https://github.com/sebastianbergmann/phpunit/issues/4070
     * - https://github.com/sebastianbergmann/phpunit/issues/4072
     *
     * @param string $message
     */
    public function directoryIsNotReadable(string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            PHPUnit::assertDirectoryNotIsReadable($this->actual, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        PHPUnit::assertDirectoryIsNotReadable($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a directory exists and is not writable.
     *
     * Introduced in PHPUnit 9.1.0 as alternative for Assert::assertDirectoryNotIsWritable()
     * The original methods these new methods replace were hard deprecated in PHPUnit 9.1.0
     * and removed in PHPUnit 10.0.0.
     *
     * Reference:
     * - https://github.com/sebastianbergmann/phpunit/issues/4073
     * - https://github.com/sebastianbergmann/phpunit/issues/4075
     *
     * @param string $message
     */
    public function directoryIsNotWritable(string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            PHPUnit::assertDirectoryNotIsWritable($this->actual, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        PHPUnit::assertDirectoryIsNotWritable($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a file does not exist.
     *
     * Introduced in PHPUnit 9.1.0 as alternative for Assert::assertFileNotExists(). The
     * original methods these new methods replace were hard deprecated in PHPUnit 9.1.0
     * and removed in PHPUnit 10.0.0.
     *
     * Reference:
     * - https://github.com/sebastianbergmann/phpunit/issues/4076
     * - https://github.com/sebastianbergmann/phpunit/issues/4078
     *
     * @param string $message
     */
    public function fileDoesNotExist(string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            PHPUnit::assertFileNotExists($this->actual, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        PHPUnit::assertFileDoesNotExist($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a file exists and is not readable.
     *
     * Introduced in PHPUnit 9.1.0 as alternative for Assert::assertFileNotIsReadable().
     * The original methods these new methods replace were hard deprecated in PHPUnit
     * 9.1.0 and removed in PHPUnit 10.0.0.
     *
     * Reference:
     * - https://github.com/sebastianbergmann/phpunit/issues/4079
     * - https://github.com/sebastianbergmann/phpunit/issues/4081
     *
     * @param string $message
     */
    public function fileIsNotReadable(string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            PHPUnit::assertFileNotIsReadable($this->actual, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        PHPUnit::assertFileIsNotReadable($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a file exists and is not writable.
     *
     * Introduced in PHPUnit 9.1.0 as alternative for Assert::assertFileNotIsWritable().
     * The original methods these new methods replace were hard deprecated in PHPUnit
     * 9.1.0 and removed in PHPUnit 10.0.0.
     *
     * Reference:
     * - https://github.com/sebastianbergmann/phpunit/issues/4082
     * - https://github.com/sebastianbergmann/phpunit/issues/4536
     *
     * @param string $message
     */
    public function fileIsNotWritable(string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            PHPUnit::assertFileNotIsWritable($this->actual, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        PHPUnit::assertFileIsNotWritable($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a file/dir exists and is not readable.
     *
     * Introduced in PHPUnit 9.1.0 as alternative for Assert::assertNotIsReadable(). The
     * original methods these new methods replace were hard deprecated in PHPUnit 9.1.0
     * and removed in PHPUnit 10.0.0.
     *
     * Reference:
     * - https://github.com/sebastianbergmann/phpunit/issues/4061
     * - https://github.com/sebastianbergmann/phpunit/issues/4063
     *
     * @param string $message
     */
    public function isNotReadable(string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            PHPUnit::assertNotIsReadable($this->actual, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        PHPUnit::assertIsNotReadable($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a file/dir exists and is not writable.
     *
     * Introduced in PHPUnit 9.1.0 as alternative for Assert::assertNotIsWritable(). The
     * original methods these new methods replace were hard deprecated in PHPUnit 9.1.0
     * and removed in PHPUnit 10.0.0.
     *
     * Reference:
     * - https://github.com/sebastianbergmann/phpunit/issues/4064
     * - https://github.com/sebastianbergmann/phpunit/issues/4066
     *
     * @param string $message
     */
    public function isNotWritable(string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            PHPUnit::assertNotIsWritable($this->actual, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        PHPUnit::assertIsNotWritable($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a string matches a given regular expression.
     *
     * Introduced in PHPUnit 9.1.0 as alternative for Assert::assertRegExp(). The original
     * methods these new methods replace were hard deprecated in PHPUnit 9.1.0 and removed
     * in PHPUnit 10.0.0.
     *
     * Reference:
     * - https://github.com/sebastianbergmann/phpunit/issues/4085
     * - https://github.com/sebastianbergmann/phpunit/issues/4087
     *
     * @param string $pattern
     * @param string $message
     */
    public function matchesRegularExpression(string $pattern, string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            PHPUnit::assertRegExp($pattern, $this->actual, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        PHPUnit::assertMatchesRegularExpression($pattern, $this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a string does not match a given regular expression.
     *
     * Introduced in PHPUnit 9.1.0 as alternative for Assert::assertNotRegExp(). The
     * original methods these new methods replace were hard deprecated in PHPUnit 9.1.0
     * and removed in PHPUnit 10.0.0.
     *
     * Reference:
     * - https://github.com/sebastianbergmann/phpunit/issues/4088
     * - https://github.com/sebastianbergmann/phpunit/issues/4090
     *
     * @param string $pattern
     * @param string $message
     */
    public function doesNotMatchRegularExpression(string $pattern, string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            PHPUnit::assertNotRegExp($pattern, $this->actual, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        PHPUnit::assertDoesNotMatchRegularExpression($pattern, $this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is of type resource and is closed.
     *
     * These methods were introduced in PHPUnit 9.3.0.
     * - https://github.com/sebastianbergmann/phpunit/pull/4365
     *
     * @param string $message
     *
     * @return self
     */
    public function isClosedResource(string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(PHPUnitVersion::series(), '9.3', '<')) {
            if ($message === '') {
                $message = sprintf(
                    'Failed asserting that %s is of type "resource (closed)"',
                    var_export($this->actual, true)
                );
            }

            PHPUnit::assertTrue(
                Validator::isClosedResource($this->actual),
                $message
            );

            return $this;
        }
        // @codeCoverageIgnoreEnd

        PHPUnit::assertIsClosedResource($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is not of type resource or is an open resource.
     *
     * These methods were introduced in PHPUnit 9.3.0.
     * - https://github.com/sebastianbergmann/phpunit/pull/4365
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotClosedResource(string $message = ''): self
    {
        // @codeCoverageIgnoreStart
        if (version_compare(PHPUnitVersion::series(), '9.3', '<')) {
            if ($message === '') {
                $message = sprintf(
                    'Failed asserting that %s is not of type "resource (closed)"',
                    var_export($this->actual, true)
                );
            }

            PHPUnit::assertFalse(
                Validator::isClosedResource($this->actual),
                $message
            );

            return $this;
        }
        // @codeCoverageIgnoreEnd

        PHPUnit::assertIsNotClosedResource($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that two objects are considered equal based on a custom object comparison
     * using a comparator method in the target object.
     *
     * These methods were introduced in PHPUnit 9.4.0.
     * - https://github.com/sebastianbergmann/phpunit/issues/4467
     *
     * @param object $expected     Expected value.
     * @param string $method       The name of the comparator method within the object.
     * @param string $message      Optional failure message to display.
     * @param object $this->actual The value to test.
     */
    public function objectEquals($expected, string $method = 'equals', string $message = '')
    {
        // @codeCoverageIgnoreStart
        if (version_compare(PHPUnitVersion::series(), '9.4', '<')) {
            // Object type declarations were introduced in PHP 7.2, so it has to be
            // validated manually
            if (! \is_object($expected)) {
                throw new \TypeError(
                    sprintf(
                        'Argument 1 passed to assertObjectEquals() must be an object, %s given',
                        get_debug_type($expected)
                    )
                );
            }

            $constraint = new ObjectEquals($expected, $method);
            PHPUnit::assertThat($this->actual, $constraint, $message);

            return $this;
        }
        // @codeCoverageIgnoreEnd

        PHPUnit::assertObjectEquals($expected, $this->actual, $method, $message);

        return $this;
    }
}
