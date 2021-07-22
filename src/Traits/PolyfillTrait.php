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
