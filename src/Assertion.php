<?php

namespace Realodix\NextProject;

use PHPUnit\Framework\Assert as PHPUnit;

class Assertion
{
    use Traits\ClassTrait;
    use Traits\ComparisonTrait;
    use Traits\FilesystemTrait;
    use Traits\IsTypeTrait;
    use Traits\StringTrait;
    use Traits\ExtendedTrait;
    use Traits\AliasesTrait;

    /** @var mixed */
    public $actual = null;

    /**
     * @param mixed $actual
     */
    public function __construct($actual)
    {
        $this->actual = $actual;
    }

    /**
     * Creates a new expectation.
     *
     * @param TValue $value
     *
     * @return self<TValue>
     */
    public function and($value): Assertion
    {
        return new self($value);
    }

    /**
     * Creates an expectation on each item of the iterable "value".
     *
     * @param null|callable $callback
     */
    public function each(callable $callback = null): Each
    {
        if (! is_iterable($this->actual)) {
            throw new \BadMethodCallException('Expectation value is not iterable.');
        }

        if (is_callable($callback)) {
            foreach ($this->actual as $item) {
                $callback(new self($item));
            }
        }

        return new Each($this);
    }

    /**
     * Asserts that an array has a specified key.
     *
     * @param int|string $key
     * @param string     $message
     */
    public function arrayHasKey($key, string $message = ''): self
    {
        PHPUnit::assertArrayHasKey($key, $this->actual, $message);

        return $this;
    }

    /**
     * Asserts that an array does not have a specified key.
     *
     * @param int|string $key
     * @param string     $message
     */
    public function arrayNotHasKey($key, string $message = ''): self
    {
        PHPUnit::assertArrayNotHasKey($key, $this->actual, $message);

        return $this;
    }

    /**
     * Asserts the number of elements of an array, Countable or Traversable.
     *
     * @param int    $expectedCount
     * @param string $message
     */
    public function count(int $expectedCount, string $message = ''): self
    {
        PHPUnit::assertCount($expectedCount, $this->actual, $message);

        return $this;
    }

    /**
     * Asserts the number of elements of an array, Countable or Traversable.
     *
     * @param int    $expectedCount
     * @param string $message
     */
    public function notCount(int $expectedCount, string $message = ''): self
    {
        PHPUnit::assertNotCount($expectedCount, $this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is empty.
     *
     * @param string $message
     */
    public function empty(string $message = ''): self
    {
        PHPUnit::assertEmpty($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is not empty.
     *
     * @param string $message
     */
    public function notEmpty(string $message = ''): self
    {
        PHPUnit::assertNotEmpty($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is finite.
     *
     * @param string $message
     */
    public function finite(string $message = ''): self
    {
        PHPUnit::assertFinite($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is infinite.
     *
     * @param string $message
     */
    public function infinite(string $message = ''): self
    {
        PHPUnit::assertInfinite($this->actual, $message);

        return $this;
    }

    /**
     * Asserts that a variable is nan.
     *
     * @param string $message
     */
    public function nan(string $message = ''): self
    {
        PHPUnit::assertNan($this->actual, $message);

        return $this;
    }
}
