<?php

namespace Realodix\NextProject\Support\Constraint;

use PHPUnit\Framework\Constraint\Constraint;

/**
 * Reference:
 * - https://phpunit.readthedocs.io/en/9.5/assertions.html#assertobjectequals
 * - https://github.com/sebastianbergmann/phpunit/blob/9.5/src/Framework/Constraint/Object/ObjectEquals.php
 * - https://github.com/sebastianbergmann/phpunit/issues/4467
 *
 * @internal
 */
final class ObjectEquals extends Constraint
{
    /**
     * @var object
     */
    private $expected;

    /**
     * @var string
     */
    private $method;

    public function __construct(object $object, string $method = 'equals')
    {
        $this->expected = $object;
        $this->method = $method;
    }

    public function toString(): string
    {
        return 'two objects are equal';
    }

    /**
     * @param mixed $other
     *
     * PHPUnit natively throws a range of different exceptions. The polyfill throws just
     * three exception type with different messages.
     *
     * @throws \ArgumentCountError
     * @throws \ErrorException
     * @throws \TypeError
     */
    protected function matches($other): bool
    {
        if (! is_object($other)) {
            // PHPUnit\Framework\ActualValueIsNotAnObjectException
            throw new \TypeError(
                sprintf(
                    'An actual value must be an object, %s given',
                    gettype($other)
                )
            );
        }

        $object = new \ReflectionObject($other);

        if (! $object->hasMethod($this->method)) {
            // PHPUnit\Framework\ComparisonMethodDoesNotExistException
            throw new \ErrorException(
                sprintf(
                    'Comparison method %s::%s() does not exist.',
                    get_class($other),
                    $this->method
                )
            );
        }

        /** @noinspection PhpUnhandledExceptionInspection */
        $method = $object->getMethod($this->method);

        // PHPUnit\Framework\ComparisonMethodDoesNotDeclareBoolReturnTypeException
        $boolReturnTypeError = sprintf(
            'Comparison method %s::%s() does not declare bool return type.',
            get_class($other),
            $this->method
        );

        if (! $method->hasReturnType()) {
            throw new \TypeError($boolReturnTypeError);
        }

        $returnType = $method->getReturnType();

        if (! $returnType instanceof \ReflectionNamedType) {
            throw new \TypeError($boolReturnTypeError);
        }

        if ($returnType->allowsNull()) {
            throw new \TypeError($boolReturnTypeError);
        }

        if ($returnType->getName() !== 'bool') {
            throw new \TypeError($boolReturnTypeError);
        }

        if (
            $method->getNumberOfParameters() !== 1
            || $method->getNumberOfRequiredParameters() !== 1
        ) {
            // PHPUnit\Framework\ComparisonMethodDoesNotDeclareExactlyOneParameterException
            throw new \ArgumentCountError(
                sprintf(
                    'Comparison method %s::%s() does not declare exactly one parameter.',
                    get_class($other),
                    $this->method
                )
            );
        }

        $parameter = $method->getParameters()[0];

        // PHPUnit\Framework\ComparisonMethodDoesNotAcceptParameterTypeException
        $parameterTypeError = sprintf(
            'Parameter of comparison method %s::%s() does not have a declared type.',
            get_class($other),
            $this->method
        );

        if (! $parameter->hasType()) {
            throw new \TypeError($parameterTypeError);
        }

        $type = $parameter->getType();

        if (! $type instanceof \ReflectionNamedType) {
            throw new \TypeError($parameterTypeError);
        }

        $typeName = $type->getName();

        if ($typeName === 'self') {
            $typeName = get_class($other);
        }

        if (! $this->expected instanceof $typeName) {
            throw new \TypeError(
                get_class($other),
                $this->method,
                get_class($this->expected)
            );
        }

        return $other->{$this->method}($this->expected);
    }

    protected function failureDescription($other): string
    {
        return $this->toString();
    }
}
