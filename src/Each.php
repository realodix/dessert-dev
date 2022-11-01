<?php

namespace Realodix\Dessert;

/**
 * @internal
 *
 * @template TValue
 */
final class Each
{
    /** @var Assertion */
    private $original;

    /** @var bool */
    private $opposite = false;

    /**
     * @readonly
     * @var Assertion<TValue>
     */
    private Assertion $original;

    /**
     * Creates an expectation on each item of the iterable "value".
     *
     * @param Assertion<TValue> $original
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
     * Creates the opposite expectation for the value.
     *
     * @return self<TValue>
     */
    public function not(): self
    {
        $this->opposite = true;

        return $this;
    }

    /**
     * Dynamically calls methods on the class with the given arguments on each item.
     *
     * @param array<int|string, mixed> $arguments
     * @return self<TValue>
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
