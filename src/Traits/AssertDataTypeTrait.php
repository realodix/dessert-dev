<?php

namespace Realodix\NextProject\Traits;

use PHPUnit\Framework\Assert as PHPUnit;
use PHPUnit\Runner\Version as PHPUnitVersion;

trait AssertDataTypeTrait
{
    /**
     * Verifies that a condition is false.
     *
     * @param string $message
     *
     * @return self
     */
    public function false(string $message = ''): self
    {
        PHPUnit::assertFalse($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is of type array.
     *
     * @param string $message
     *
     * @return self
     */
    public function isArray(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertInternalType('array', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsArray($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is of type bool.
     *
     * @param string $message
     *
     * @return self
     */
    public function isBool(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertInternalType('bool', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsBool($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is of type callable.
     *
     * @param string $message
     *
     * @return self
     */
    public function isCallable(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertInternalType('callable', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsCallable($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is of type resource and is closed.
     *
     * @param string $message
     *
     * @return self
     */
    public function isClosedResource(string $message = ''): self
    {
        PHPUnit::assertIsClosedResource($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is of type float.
     *
     * @param string $message
     *
     * @return self
     */
    public function isFloat(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertInternalType('float', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsFloat($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is of type int.
     *
     * @param string $message
     *
     * @return self
     */
    public function isInt(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertInternalType('int', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsInt($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is of type iterable.
     *
     * @param string $message
     *
     * @return self
     */
    public function isIterable(string $message = ''): self
    {
        PHPUnit::assertIsIterable($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is not of type array.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotArray(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotInternalType('array', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsNotArray($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is not of type bool.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotBool(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotInternalType('bool', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsNotBool($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is not of type callable.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotCallable(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotInternalType('callable', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsNotCallable($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is not of type resource.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotClosedResource(string $message = ''): self
    {
        PHPUnit::assertIsNotClosedResource($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is not of type float.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotFloat(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotInternalType('float', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsNotFloat($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is not of type int.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotInt(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotInternalType('int', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsNotInt($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is not of type iterable.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotIterable(string $message = ''): self
    {
        PHPUnit::assertIsNotIterable($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is not of type numeric.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotNumeric(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotInternalType('numeric', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsNotNumeric($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is not of type object.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotObject(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotInternalType('object', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsNotObject($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is not of type resource.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotResource(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotInternalType('resource', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsNotResource($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is not of type scalar.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotScalar(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotInternalType('scalar', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsNotScalar($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is not of type string.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotString(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotInternalType('string', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsNotString($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is of type numeric.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNumeric(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertInternalType('numeric', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsNumeric($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is of type object.
     *
     * @param string $message
     *
     * @return self
     */
    public function isObject(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertInternalType('object', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsObject($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is of type resource.
     *
     * @param string $message
     *
     * @return self
     */
    public function isResource(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertInternalType('resource', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsResource($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is of type scalar.
     *
     * @param string $message
     *
     * @return self
     */
    public function isScalar(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertInternalType('scalar', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsScalar($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is of type string.
     *
     * @param string $message
     *
     * @return self
     */
    public function isString(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '7.5', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertInternalType('string', $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsString($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a condition is not false.
     *
     * @param string $message
     *
     * @return self
     */
    public function notFalse(string $message = ''): self
    {
        PHPUnit::assertNotFalse($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is not null.
     *
     * @param string $message
     *
     * @return self
     */
    public function notNull(string $message = ''): self
    {
        PHPUnit::assertNotNull($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a condition is not true.
     *
     * @param string $message
     *
     * @return self
     */
    public function notTrue(string $message = ''): self
    {
        PHPUnit::assertNotTrue($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a variable is null.
     *
     * @param string $message
     *
     * @return self
     */
    public function null(string $message = ''): self
    {
        PHPUnit::assertNull($this->actual, $message);

        return $this;
    }

    /**
     * Verifies that a condition is true.
     *
     * @param string $message
     *
     * @return self
     */
    public function true(string $message = ''): self
    {
        PHPUnit::assertTrue($this->actual, $message);

        return $this;
    }
}
