<?php

namespace Realodix\NextProject\Traits;

use PHPUnit\Framework\Assert as PHPUnit;
use PHPUnit\Runner\Version as PHPUnitVersion;
use Realodix\NextProject\Support\Validator;

trait PolyfillTrait
{
    /**
     * Asserts that a directory does not exist.
     *
     * Introduced in PHPUnit 9.1.0 as alternative for Assert::assertDirectoryNotExists().
     * The original methods these new methods replace were hard deprecated in PHPUnit
     * 9.1.0 and (will be) removed in PHPUnit 10.0.0.
     *
     * @param string $message
     */
    public function directoryDoesNotExist(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertDirectoryNotExists($this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertDirectoryDoesNotExist($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a directory exists and is not readable.
     *
     * Introduced in PHPUnit 9.1.0 as alternative for Assert::assertDirectoryNotIsReadable().
     * The original methods these new methods replace were hard deprecated in PHPUnit 9.1.0
     * and (will be) removed in PHPUnit 10.0.0.
     *
     * @param string $message
     */
    public function directoryIsNotReadable(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertDirectoryNotIsReadable($this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertDirectoryIsNotReadable($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a directory exists and is not writable.
     *
     * Introduced in PHPUnit 9.1.0 as alternative for Assert::assertDirectoryNotIsWritable()
     * The original methods these new methods replace were hard deprecated in PHPUnit 9.1.0
     * and (will be) removed in PHPUnit 10.0.0.
     *
     * @param string $message
     */
    public function directoryIsNotWritable(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertDirectoryNotIsWritable($this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertDirectoryIsNotWritable($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a file does not exist.
     *
     * Introduced in PHPUnit 9.1.0 as alternative for Assert::assertFileNotExists(). The
     * original methods these new methods replace were hard deprecated in PHPUnit 9.1.0
     * and (will be) removed in PHPUnit 10.0.0.
     *
     * @param string $message
     */
    public function fileDoesNotExist(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertFileNotExists($this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertFileDoesNotExist($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a file exists and is not readable.
     *
     * Introduced in PHPUnit 9.1.0 as alternative for Assert::assertFileNotIsReadable().
     * The original methods these new methods replace were hard deprecated in PHPUnit
     * 9.1.0 and (will be) removed in PHPUnit 10.0.0.
     *
     * @param string $message
     */
    public function fileIsNotReadable(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertFileNotIsReadable($this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertFileIsNotReadable($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a file exists and is not writable.
     *
     * Introduced in PHPUnit 9.1.0 as alternative for Assert::assertFileNotIsWritable().
     * The original methods these new methods replace were hard deprecated in PHPUnit
     * 9.1.0 and (will be) removed in PHPUnit 10.0.0.
     *
     * @param string $message
     */
    public function fileIsNotWritable(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertFileNotIsWritable($this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertFileIsNotWritable($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is of type resource and is closed.
     *
     * These methods were introduced in PHPUnit 9.3.0.
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
                $message = sprintf(
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
     * These methods were introduced in PHPUnit 9.3.0.
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
                $message = sprintf(
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
     * Asserts that a file/dir exists and is not readable.
     *
     * Introduced in PHPUnit 9.1.0 as alternative for Assert::assertNotIsReadable(). The
     * original methods these new methods replace were hard deprecated in PHPUnit 9.1.0
     * and (will be) removed in PHPUnit 10.0.0.
     *
     * @param string $message
     */
    public function isNotReadable(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotIsReadable($this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsNotReadable($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a file/dir exists and is not writable.
     *
     * Introduced in PHPUnit 9.1.0 as alternative for Assert::assertNotIsWritable(). The
     * original methods these new methods replace were hard deprecated in PHPUnit 9.1.0
     * and (will be) removed in PHPUnit 10.0.0.
     *
     * @param string $message
     */
    public function isNotWritable(string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotIsWritable($this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertIsNotWritable($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a string matches a given regular expression.
     *
     * Introduced in PHPUnit 9.1.0 as alternative for Assert::assertRegExp(). The original
     * methods these new methods replace were hard deprecated in PHPUnit 9.1.0 and (will
     * be) removed in PHPUnit 10.0.0.
     *
     * @param string $pattern
     * @param string $message
     */
    public function matchesRegularExpression(string $pattern, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertRegExp($pattern, $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertMatchesRegularExpression($pattern, $this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a string does not match a given regular expression.
     *
     * Introduced in PHPUnit 9.1.0 as alternative for Assert::assertNotRegExp(). The
     * original methods these new methods replace were hard deprecated in PHPUnit 9.1.0
     * and (will be) removed in PHPUnit 10.0.0.
     *
     * @param string $pattern
     * @param string $message
     */
    public function doesNotMatchRegularExpression(string $pattern, string $message = ''): self
    {
        if (version_compare(PHPUnitVersion::series(), '9.1', '<')) {
            // @codeCoverageIgnoreStart
            PHPUnit::assertNotRegExp($pattern, $this->actual, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

        PHPUnit::assertDoesNotMatchRegularExpression($pattern, $this->actual, $message);

        return $this;
    }

    /**
     * Asserts that two objects are considered equal based on a custom object comparison
     * using a comparator method in the target object.
     *
     * Reference:
     * - https://phpunit.readthedocs.io/en/9.5/assertions.html#assertobjectequals
     * - https://github.com/sebastianbergmann/phpunit/blob/9.5/src/Framework/Constraint/Object/ObjectEquals.php
     * - https://github.com/sebastianbergmann/phpunit/issues/4467
     *
     * @param object $expected     Expected value.
     * @param string $method       The name of the comparator method within the object.
     * @param string $message      Optional failure message to display.
     * @param object $this->actual The value to test.
     *
     * @throws ExpectationFailedException
     *
     * PHPUnit natively throws a range of different exceptions. The polyfill throws just
     * two exception type with different messages.
     * @throws \ArgumentCountError
     * @throws \ErrorException
     * @throws \TypeError
     */
    public function objectEquals(object $expected, string $method = 'equals', string $message = '')
    {
        $actual = $this->actual;

        /*
         * Parameter input validation.
         */
        if (! is_object($actual)) {
            // PHPUnit\Framework\ActualValueIsNotAnObjectException
            throw new \TypeError(
                sprintf(
                    'An actual value must be an object, %s given',
                    gettype($actual)
                )
            );
        }

        /*
         * Comparator method validation.
         */
        $object = new \ReflectionObject($actual);

        if (! $object->hasMethod($method)) {
            // PHPUnit\Framework\ComparisonMethodDoesNotExistException
            throw new \ErrorException(
                sprintf(
                    'Comparison method %s::%s() does not exist.',
                    get_class($actual),
                    $method
                )
            );
        }

        $thisMethod = $object->getMethod($method);

        // PHPUnit\Framework\ComparisonMethodDoesNotDeclareBoolReturnTypeException
        $boolReturnTypeError = sprintf(
            'Comparison method %s::%s() does not declare bool return type.',
            get_class($actual),
            $method
        );

        if (! $thisMethod->hasReturnType()) {
            throw new \TypeError($boolReturnTypeError);
        }

        $returnType = $thisMethod->getReturnType();

        if (! $returnType instanceof \ReflectionNamedType) {
            throw new \TypeError($boolReturnTypeError);
        }

        if ($returnType->allowsNull()) {
            throw new \TypeError($boolReturnTypeError);
        }

        if ($returnType->getName() !== 'bool') {
            throw new \TypeError($boolReturnTypeError);
        }

        /*
         * Comparator method parameter requirements validation.
         */
        if (
            $thisMethod->getNumberOfParameters() !== 1
            || $thisMethod->getNumberOfRequiredParameters() !== 1
        ) {
            // PHPUnit\Framework\ComparisonMethodDoesNotDeclareExactlyOneParameterException
            throw new \ArgumentCountError(
                sprintf(
                    'Comparison method %s::%s() does not declare exactly one parameter.',
                    get_class($actual),
                    $method
                )
            );
        }

        // PHPUnit\Framework\ComparisonMethodDoesNotAcceptParameterTypeException
        $parameterTypeError = sprintf(
            'Parameter of comparison method %s::%s() does not have a declared type.',
            get_class($actual),
            $method
        );

        $parameter = $thisMethod->getParameters()[0];

        if (! $parameter->hasType()) {
            throw new \TypeError($parameterTypeError);
        }

        $type = $parameter->getType();

        if (! $type instanceof \ReflectionNamedType) {
            throw new \TypeError($parameterTypeError);
        }

        $typeName = $type->getName();

        /*
         * Validate that the $expected object complies with the declared parameter type.
         */
        if ($typeName === 'self') {
            $typeName = get_class($actual);
        }

        if (! $expected instanceof $typeName) {
            // PHPUnit\Framework\ComparisonMethodDoesNotAcceptParameterTypeException
            throw new \TypeError(
                sprintf(
                    '%s is not an accepted argument type for comparison method %s::%s().',
                    get_class($actual),
                    get_class($actual),
                    $method
                )
            );
        }

        /*
         * Execute the comparator method.
         */
        $result = $actual->{$method}($expected);

        $msg = sprintf(
            'Failed asserting that two objects are equal. The objects are not equal according to %s::%s()',
            get_class($actual),
            $method
        );

        if ($message !== '') {
            $msg = $message.\PHP_EOL.$msg;
        }

        PHPUnit::assertTrue($result, $msg);

        return $this;
    }
}
