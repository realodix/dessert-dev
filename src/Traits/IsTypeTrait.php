<?php

namespace Realodix\NextProject\Traits;

use PHPUnit\Framework\Assert as PHPUnit;
use PHPUnit\Runner\Version as PHPUnitVersion;
use Realodix\NextProject\Support\Validator;

trait IsTypeTrait
{
    /**
     * Asserts that a variable is of type array.
     *
     * @param string $message
     *
     * @return self
     */
    public function isArray(string $message = ''): self
    {
        PHPUnit::assertIsArray($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is not of type array.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotArray(string $message = ''): self
    {
        PHPUnit::assertIsNotArray($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is of type bool.
     *
     * @param string $message
     *
     * @return self
     */
    public function isBool(string $message = ''): self
    {
        PHPUnit::assertIsBool($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is not of type bool.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotBool(string $message = ''): self
    {
        PHPUnit::assertIsNotBool($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is of type callable.
     *
     * @param string $message
     *
     * @return self
     */
    public function isCallable(string $message = ''): self
    {
        PHPUnit::assertIsCallable($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is not of type callable.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotCallable(string $message = ''): self
    {
        PHPUnit::assertIsNotCallable($this->actual, $message);

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
        if (version_compare(PHPUnitVersion::series(), '9.3', '<')) {
            // @codeCoverageIgnoreStart
            if ($message === '') {
                $message = \sprintf(
                    'Failed asserting that %s is of type "resource (closed)"',
                    \var_export($this->actual, true)
                );
            }

            PHPUnit::assertTrue(Validator::isClosedResource($this->actual), $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsClosedResource($this->actual, $message);

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
        if (version_compare(PHPUnitVersion::series(), '9.3', '<')) {
            // @codeCoverageIgnoreStart
            if ($message === '') {
                $message = \sprintf(
                    'Failed asserting that %s is not of type "resource (closed)"',
                    \var_export($this->actual, true)
                );
            }

            PHPUnit::assertFalse(Validator::isClosedResource($this->actual), $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsNotClosedResource($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is of type float.
     *
     * @param string $message
     *
     * @return self
     */
    public function isFloat(string $message = ''): self
    {
        PHPUnit::assertIsFloat($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is not of type float.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotFloat(string $message = ''): self
    {
        PHPUnit::assertIsNotFloat($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is of type int.
     *
     * @param string $message
     *
     * @return self
     */
    public function isInt(string $message = ''): self
    {
        PHPUnit::assertIsInt($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is not of type int.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotInt(string $message = ''): self
    {
        PHPUnit::assertIsNotInt($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is of type iterable.
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
     * Asserts that a variable is not of type iterable.
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
     * Asserts that a variable is of type numeric.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNumeric(string $message = ''): self
    {
        PHPUnit::assertIsNumeric($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is not of type numeric.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotNumeric(string $message = ''): self
    {
        PHPUnit::assertIsNotNumeric($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is of type object.
     *
     * @param string $message
     *
     * @return self
     */
    public function isObject(string $message = ''): self
    {
        PHPUnit::assertIsObject($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is not of type object.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotObject(string $message = ''): self
    {
        PHPUnit::assertIsNotObject($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is of type resource.
     *
     * @param string $message
     *
     * @return self
     */
    public function isResource(string $message = ''): self
    {
        PHPUnit::assertIsResource($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is not of type resource.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotResource(string $message = ''): self
    {
        PHPUnit::assertIsNotResource($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is of type scalar.
     *
     * @param string $message
     *
     * @return self
     */
    public function isScalar(string $message = ''): self
    {
        PHPUnit::assertIsScalar($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is not of type scalar.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotScalar(string $message = ''): self
    {
        PHPUnit::assertIsNotScalar($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is of type string.
     *
     * @param string $message
     *
     * @return self
     */
    public function isString(string $message = ''): self
    {
        PHPUnit::assertIsString($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is not of type string.
     *
     * @param string $message
     *
     * @return self
     */
    public function isNotString(string $message = ''): self
    {
        PHPUnit::assertIsNotString($this->actual, $message);

        return $this;
    }
}
