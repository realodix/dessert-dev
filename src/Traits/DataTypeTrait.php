<?php

namespace Realodix\NextProject\Traits;

use PHPUnit\Framework\Assert as PHPUnit;
use PHPUnit\Runner\Version as PUVersion;
use Realodix\NextProject\Helpers\ResourceHelper;

trait DataTypeTrait
{
    public function isArray(string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertInternalType('array', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsArray($this->actual, $message);

        return $this;
    }

    public function isBool(string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertInternalType('bool', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsBool($this->actual, $message);

        return $this;
    }

    public function isCallable(string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertInternalType('callable', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsCallable($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is of type resource and is closed.
     *
     * @param string $message
     *
     * @return self
     */
    public function isClosedResource(string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '9.3', '<')) {
            // @codeCoverageIgnoreStart
            if ($message === '') {
                $message = \sprintf(
                    'Failed asserting that %s is of type "resource (closed)"',
                    \var_export($this->actual, true)
                );
            }

            PHPUnit::assertTrue(ResourceHelper::isClosedResource($this->actual), $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsClosedResource($this->actual, $message);

        return $this;
    }

    public function isFloat(string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertInternalType('float', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsFloat($this->actual, $message);

        return $this;
    }

    public function isInt(string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertInternalType('int', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsInt($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is of type iterable.
     *
     * {@internal Support for `iterable` was only added to the `Assert::assertInternalType()` method
     * in PHPUnit 7.1.0, so this polyfill can't use a direct fall-through to that functionality
     * until the minimum supported PHPUnit version of this library would be PHPUnit 7.1.0.}
     *
     * @link https://github.com/sebastianbergmann/phpunit/pull/3035 PR which added support for `is_iterable`
     *                                                              to `Assert::assertInternalType()`.
     *
     * @param string $message Optional failure message to display
     *
     * @return self
     */
    public function isIterable(string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            if (\function_exists('is_iterable') === true) {
                // PHP >= 7.1.
                PHPUnit::assertTrue(\is_iterable($this->actual), $message);

                return $this;
            }

            // PHP < 7.1.
            $result = \is_array($this->actual) || $this->actual instanceof \Traversable;
            PHPUnit::assertTrue($result, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsIterable($this->actual, $message);

        return $this;
    }

    public function isNotArray(string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotInternalType('array', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsNotArray($this->actual, $message);

        return $this;
    }

    public function isNotBool(string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotInternalType('bool', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsNotBool($this->actual, $message);

        return $this;
    }

    public function isNotCallable(string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotInternalType('callable', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsNotCallable($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is not of type resource or is an open resource.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotClosedResource(string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '9.3', '<')) {
            // @codeCoverageIgnoreStart
            if ($message === '') {
                $message = \sprintf(
                    'Failed asserting that %s is not of type "resource (closed)"',
                    \var_export($this->actual, true)
                );
            }

            PHPUnit::assertFalse(ResourceHelper::isClosedResource($this->actual), $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsNotClosedResource($this->actual, $message);

        return $this;
    }

    public function isNotFloat(string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotInternalType('float', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsNotFloat($this->actual, $message);

        return $this;
    }

    public function isNotInt(string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotInternalType('int', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsNotInt($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is not of type iterable.
     *
     * {@internal Support for `iterable` was only added to the `Assert::assertNotInternalType()` method
     * in PHPUnit 7.1.0, so this polyfill can't use a direct fall-through to that functionality
     * until the minimum supported PHPUnit version of this library would be PHPUnit 7.1.0.}
     *
     * @link https://github.com/sebastianbergmann/phpunit/pull/3035 PR which added support for `is_iterable`
     *                                                              to `Assert::assertNotInternalType()`.
     *
     * @param string $message Optional failure message to display
     *
     * @return self
     */
    public function isNotIterable(string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            if (\function_exists('is_iterable') === true) {
                // PHP >= 7.1.
                PHPUnit::assertFalse(\is_iterable($this->actual), $message);

                return $this;
            }

            // PHP < 7.1.
            $result = \is_array($this->actual) || $this->actual instanceof \Traversable;
            PHPUnit::assertFalse($result, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsNotIterable($this->actual, $message);

        return $this;
    }

    public function isNotNumeric(string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotInternalType('numeric', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsNotNumeric($this->actual, $message);

        return $this;
    }

    public function isNotObject(string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotInternalType('object', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsNotObject($this->actual, $message);

        return $this;
    }

    public function isNotResource(string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotInternalType('resource', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsNotResource($this->actual, $message);

        return $this;
    }

    public function isNotScalar(string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotInternalType('scalar', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsNotScalar($this->actual, $message);

        return $this;
    }

    public function isNotString(string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotInternalType('string', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsNotString($this->actual, $message);

        return $this;
    }

    public function isNumeric(string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertInternalType('numeric', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsNumeric($this->actual, $message);

        return $this;
    }

    public function isObject(string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertInternalType('object', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsObject($this->actual, $message);

        return $this;
    }

    public function isResource(string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertInternalType('resource', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsResource($this->actual, $message);

        return $this;
    }

    public function isScalar(string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertInternalType('scalar', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsScalar($this->actual, $message);

        return $this;
    }

    public function isString(string $message = ''): self
    {
        if (version_compare(PUVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertInternalType('string', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsString($this->actual, $message);

        return $this;
    }
}
