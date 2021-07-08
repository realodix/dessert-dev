<?php

namespace Realodix\NextProject\BddStyles;

use ArrayAccess;
use function basename;
use Countable;
use function is_array;
use function is_iterable;
use PHPUnit\Framework\Assert as PHPUnit;
use Realodix\NextProject\Exception\InvalidVerifyException;
use Realodix\NextProject\Expect;

class ExpectArray extends Expect
{
    /**
     * @param array|ArrayAccess|Countable|iterable $actual
     */
    public function __construct($actual)
    {
        if (
            is_array($actual) ||
            $actual instanceof ArrayAccess ||
            $actual instanceof Countable ||
            is_iterable($actual)
        ) {
            parent::__construct($actual);

            return;
        }
        throw new InvalidVerifyException(basename(self::class), $actual);
    }

    /**
     * Expect that a haystack does not contain a needle.
     *
     * @param mixed  $needle
     * @param string $message
     *
     * @return self
     */
    public function notToContain($needle, string $message = ''): self
    {
        PHPUnit::assertNotContains($needle, $this->actual, $message);

        return $this;
    }

    public function notToContainEqual($needle, $message = ''): self
    {
        PHPUnit::assertNotContainsEquals($needle, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that a haystack does not contain only values of a given type.
     *
     * @param string    $type
     * @param bool|null $isNativeType
     * @param string    $message
     *
     * @return self
     */
    public function notToContainOnly(string $type, ?bool $isNativeType = null, string $message = ''): self
    {
        PHPUnit::assertNotContainsOnly($type, $this->actual, $isNativeType, $message);

        return $this;
    }

    /**
     * Expect the number of elements of an array, Countable or Traversable.
     *
     * @param int    $expectedCount
     * @param string $message
     *
     * @return self
     */
    public function notToHaveCount(int $expectedCount, string $message = ''): self
    {
        PHPUnit::assertNotCount($expectedCount, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that an array does not have a specified key.
     *
     * @param int|string $key
     * @param string     $message
     *
     * @return self
     */
    public function notToHaveKey($key, string $message = ''): self
    {
        PHPUnit::assertArrayNotHasKey($key, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that the size of two arrays (or `Countable` or `Traversable` objects) is not the same.
     *
     * @param Countable|iterable $expected
     * @param string             $message
     *
     * @return self
     */
    public function notToHaveSameSizeAs($expected, string $message = ''): self
    {
        PHPUnit::assertNotSameSize($expected, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that a haystack contains a needle.
     *
     * @param mixed  $needle
     * @param string $message
     *
     * @return self
     */
    public function toContain($needle, string $message = ''): self
    {
        PHPUnit::assertContains($needle, $this->actual, $message);

        return $this;
    }

    public function toContainEqual($needle, string $message = ''): self
    {
        PHPUnit::assertContainsEquals($needle, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that a haystack contains only values of a given type.
     *
     * @param string    $type
     * @param bool|null $isNativeType
     * @param string    $message
     *
     * @return self
     */
    public function toContainOnly(string $type, ?bool $isNativeType = null, string $message = ''): self
    {
        PHPUnit::assertContainsOnly($type, $this->actual, $isNativeType, $message);

        return $this;
    }

    /**
     * Expect that a haystack contains only instances of a given class name.
     *
     * @param string $className
     * @param string $message
     *
     * @return self
     */
    public function toContainOnlyInstancesOf(string $className, string $message = ''): self
    {
        PHPUnit::assertContainsOnlyInstancesOf($className, $this->actual, $message);

        return $this;
    }

    /**
     * Expect the number of elements of an array, Countable or Traversable.
     *
     * @param int    $expectedCount
     * @param string $message
     *
     * @return self
     */
    public function toHaveCount(int $expectedCount, string $message = ''): self
    {
        PHPUnit::assertCount($expectedCount, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that an array has a specified key.
     *
     * @param int|string $key
     * @param string     $message
     *
     * @return self
     */
    public function toHaveKey($key, string $message = ''): self
    {
        PHPUnit::assertArrayHasKey($key, $this->actual, $message);

        return $this;
    }

    /**
     * Expect that the size of two arrays (or `Countable` or `Traversable` objects) is the same.
     *
     * @param Countable|iterable $expected
     * @param string             $message
     *
     * @return self
     */
    public function toHaveSameSizeAs($expected, string $message = ''): self
    {
        PHPUnit::assertSameSize($expected, $this->actual, $message);

        return $this;
    }
}
