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
     * The custom comparator method is expected to have the following method signature:
     * `equals(self $other): bool` (or similar with a different method name).
     *
     * Basically, the assertion checks the following:
     * - A method with name $method must exist on the $actual object.
     * - The method must accept exactly one argument and this argument must be required.
     * - This parameter must have a classname-based declared type.
     * - The $expected object must be compatible with this declared type.
     * - The method must have a declared bool return type. (JRF: not verified in this
     *   implementation)
     * - `$actual->$method($expected)` returns boolean true.
     *
     * @param object $expected     Expected value.
     * @param string $method       The name of the comparator method within the object.
     * @param string $message      Optional failure message to display.
     * @param object $this->actual The value to test.
     *
     * @throws \TypeError When any of the passed arguments do not meet the required type.
     * @throws \Exception When the comparator method does not comply with therequirements.
     *                    PHPUnit natively throws a range of different exceptions. The
     *                    polyfill throws just one exception type with different messages.
     *
     * @return void
     */
    public function objectEquals(object $expected, string $method = 'equals', string $message = '')
    {
        $actual = $this->actual;

        /*
         * Parameter input validation.
         */
        if (! is_object($actual)) {
            throw new TypeError(
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
            throw new \Exception(
                sprintf(
                    'Comparison method %s::%s() does not exist.',
                    get_class($actual),
                    $method
                )
            );
        }

        $thisMethod = $object->getMethod($method);

        $notDeclareBoolReturnType = sprintf(
            'Comparison method %s::%s() does not declare bool return type.',
            get_class($actual),
            $method
        );

        if (! $thisMethod->hasReturnType()) {
            throw new \Exception($notDeclareBoolReturnType);
        }

        $returnType = $thisMethod->getReturnType();

        if (! $returnType instanceof \ReflectionNamedType) {
            throw new \Exception($notDeclareBoolReturnType);
        }

        if ($returnType->allowsNull()) {
            throw new \Exception($notDeclareBoolReturnType);
        }

        if ($returnType->getName() !== 'bool') {
            throw new \Exception($notDeclareBoolReturnType);
        }

        /*
         * Comparator method parameter requirements validation.
         */
        if (
            $thisMethod->getNumberOfParameters() !== 1
            || $thisMethod->getNumberOfRequiredParameters() !== 1
        ) {
            throw new \Exception(
                sprintf(
                    'Comparison method %s::%s() does not declare exactly one parameter.',
                    get_class($actual),
                    $method
                )
            );
        }

        $noDeclaredTypeError = sprintf(
            'Parameter of comparison method %s::%s() does not have a declared type.',
            get_class($actual),
            $method
        );

        $parameter = $thisMethod->getParameters()[0];

        if (! $parameter->hasType()) {
            throw new \Exception($noDeclaredTypeError);
        }

        $type = $parameter->getType();

        if (! $type instanceof \ReflectionNamedType) {
            throw new \Exception($noDeclaredTypeError);
        }

        $typeName = $type->getName();

        /*
         * Validate that the $expected object complies with the declared parameter type.
         */
        if ($typeName === 'self') {
            $typeName = get_class($actual);
        }

        if (! $expected instanceof $typeName) {
            throw new \Exception(
                sprintf(
                    '%s is not an accepted argument type for comparison method %s::%s().',
                    get_class($expected),
                    get_class($actual),
                    $method
                )
            );
        }

        /*
         * Execute the comparator method.
         */
        $result = $actual->{$method}($expected);

        if (! is_bool($result)) {
            throw new \Exception(
                sprintf(
                    'Comparison method %s::%s() does not return a boolean value.',
                    get_class($actual),
                    $method
                )
            );
        }

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
