<?php

namespace Realodix\NextProject\Assert;

use PHPUnit\Framework\Assert as PHPUnit;
use PHPUnit\Runner\Version as PHPUnitVersion;

trait AssertDataTypeTrait
{
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
            PHPUnit::assertInternalType('array', $this->actual, $message);

            return $this;
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
            PHPUnit::assertInternalType('bool', $this->actual, $message);

            return $this;
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
            PHPUnit::assertInternalType('callable', $this->actual, $message);

            return $this;
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
            PHPUnit::assertInternalType('float', $this->actual, $message);

            return $this;
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
            PHPUnit::assertInternalType('int', $this->actual, $message);

            return $this;
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
            PHPUnit::assertNotInternalType('array', $this->actual, $message);

            return $this;
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
            PHPUnit::assertNotInternalType('bool', $this->actual, $message);

            return $this;
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
            PHPUnit::assertNotInternalType('callable', $this->actual, $message);

            return $this;
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
            PHPUnit::assertNotInternalType('float', $this->actual, $message);

            return $this;
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
            PHPUnit::assertNotInternalType('int', $this->actual, $message);

            return $this;
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
            PHPUnit::assertNotInternalType('numeric', $this->actual, $message);

            return $this;
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
            PHPUnit::assertNotInternalType('object', $this->actual, $message);

            return $this;
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
            PHPUnit::assertNotInternalType('resource', $this->actual, $message);

            return $this;
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
            PHPUnit::assertNotInternalType('scalar', $this->actual, $message);

            return $this;
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
            PHPUnit::assertNotInternalType('string', $this->actual, $message);

            return $this;
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
            PHPUnit::assertInternalType('numeric', $this->actual, $message);

            return $this;
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
            PHPUnit::assertInternalType('object', $this->actual, $message);

            return $this;
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
            PHPUnit::assertInternalType('resource', $this->actual, $message);

            return $this;
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
            PHPUnit::assertInternalType('scalar', $this->actual, $message);

            return $this;
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
            PHPUnit::assertInternalType('string', $this->actual, $message);

            return $this;
        }

        PHPUnit::assertIsString($this->actual, $message);

        return $this;
    }
}
