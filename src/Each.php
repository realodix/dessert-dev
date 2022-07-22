<?php

namespace Realodix\Dessert;

/**
 * @internal
 */
final class Each
{
    /** @var Assertion */
    private $original;

    /** @var bool */
    private $opposite = false;

    /**
     * Creates an expectation on each item of the iterable "value".
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
     * @return self
     */
    public function not(): Each
    {
        $this->opposite = true;

        return $this;
    }

    /**
     * Dynamically calls methods on the class with the given arguments on each item.
     *
     * @param array<int|string, mixed> $arguments
     */
    public function __call(string $name, array $arguments): Each
    {
        foreach ($this->original->actual as $item) {
            // verify($item)->$name(...$arguments);
            $this->opposite ? verify($item)->not()->$name(...$arguments) : verify($item)->$name(...$arguments);
        }

        $this->opposite = false;

        return $this;
    }

    /**
     * Dynamically calls methods on the class without any arguments on each item.
     */
    public function __get(string $name): Each
    {
        return $this->$name();
    }
}
