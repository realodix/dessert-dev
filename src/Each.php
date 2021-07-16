<?php

namespace Realodix\NextProject;

/**
 * @internal
 *
 * @mixin Expectation
 */
final class Each
{
    /**
     * @var Expectation
     */
    private $original;

    /**
     * Creates an expectation on each item of the iterable "value".
     *
     * @param Assertion $original
     */
    public function __construct(Assertion $original)
    {
        $this->original = $original;
    }

    /**
     * Creates a new expectation.
     *
     * @param mixed $value
     */
    public function and($value): Assertion
    {
        return $this->original->and($value);
    }

    /**
     * Dynamically calls methods on the class with the given arguments on each item.
     *
     * @param string                   $name
     * @param array<int|string, mixed> $arguments
     */
    public function __call(string $name, array $arguments): Each
    {
        foreach ($this->original->actual as $item) {
            expect($item)->$name(...$arguments);
        }

        return $this;
    }

    /**
     * Dynamically calls methods on the class without any arguments on each item.
     *
     * @param string $name
     */
    public function __get(string $name): Each
    {
        /* @phpstan-ignore-next-line */
        return $this->$name();
    }
}
