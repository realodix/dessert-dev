<?php

namespace Realodix\NextProject\Support;

use function is_object;
use ReflectionNamedType;
use ReflectionObject;
use PHPUnit\Framework\Constraint\Constraint;

/**
 * @internal
 */
final class ConstraintObjectEquals extends Constraint
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
        $this->method   = $method;
    }

    public function toString(): string
    {
        return 'two objects are equal';
    }

    /**
     * @throws \ArgumentCountError
     * @throws \ErrorException
     * @throws \TypeError
     */
    protected function matches($other): bool
    {
        if (!is_object($other)) {
            // PHPUnit\Framework\ActualValueIsNotAnObjectException
            throw new \TypeError(
                sprintf(
                    'An actual value must be an object, %s given',
                    gettype($actual)
                )
            );
        }

        $object = new ReflectionObject($other);

        if (!$object->hasMethod($this->method)) {
            throw new ComparisonMethodDoesNotExistException(
                get_class($other),
                $this->method
            );
        }

        /** @noinspection PhpUnhandledExceptionInspection */
        $method = $object->getMethod($this->method);

        if (!$method->hasReturnType()) {
            throw new ComparisonMethodDoesNotDeclareBoolReturnTypeException(
                get_class($other),
                $this->method
            );
        }

        $returnType = $method->getReturnType();

        if (!$returnType instanceof ReflectionNamedType) {
            throw new ComparisonMethodDoesNotDeclareBoolReturnTypeException(
                get_class($other),
                $this->method
            );
        }

        if ($returnType->allowsNull()) {
            throw new ComparisonMethodDoesNotDeclareBoolReturnTypeException(
                get_class($other),
                $this->method
            );
        }

        if ($returnType->getName() !== 'bool') {
            throw new ComparisonMethodDoesNotDeclareBoolReturnTypeException(
                get_class($other),
                $this->method
            );
        }

        if ($method->getNumberOfParameters() !== 1 || $method->getNumberOfRequiredParameters() !== 1) {
            throw new ComparisonMethodDoesNotDeclareExactlyOneParameterException(
                get_class($other),
                $this->method
            );
        }

        $parameter = $method->getParameters()[0];

        if (!$parameter->hasType()) {
            throw new ComparisonMethodDoesNotDeclareParameterTypeException(
                get_class($other),
                $this->method
            );
        }

        $type = $parameter->getType();

        if (!$type instanceof ReflectionNamedType) {
            throw new ComparisonMethodDoesNotDeclareParameterTypeException(
                get_class($other),
                $this->method
            );
        }

        $typeName = $type->getName();

        if ($typeName === 'self') {
            $typeName = get_class($other);
        }

        if (!$this->expected instanceof $typeName) {
            throw new ComparisonMethodDoesNotAcceptParameterTypeException(
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
