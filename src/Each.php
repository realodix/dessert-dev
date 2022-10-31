<?php

namespace Realodix\Dessert;

/**
 * @internal
 *
 * @template TValue
 */
final class Each
{
    private bool $opposite = false;

    /**
     * Creates an expectation on each item of the iterable "value".
     *
     * @param Assertion<TValue> $original
     */
    public function __construct(private Assertion $original)
    {
    }

    /**
     * Creates a new expectation.
     */
    public function and(mixed $value): Assertion
    {
        return $this->original->and($value);
    }

    /**
     * Creates the opposite expectation for the value.
     */
    public function not(): Each
    {
        $this->opposite = true;

        return $this;
    }

    /**
     * Dynamically calls methods on the class with the given arguments on each item.
     */
    public function __call(string $name, array $arguments): self
    {
        foreach ($this->original->actual as $item) {
            $this->opposite ? verify($item)->not()->$name(...$arguments) : verify($item)->$name(...$arguments);
        }

        $this->opposite = false;

        return $this;
    }

    /**
     * Dynamically calls methods on the class without any arguments on each item.
     *
     * @return self<TValue>
     */
    public function __get(string $name): self
    {
        return $this->$name();
    }
}
