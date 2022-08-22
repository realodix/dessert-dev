<?php

namespace Realodix\Dessert\Traits;

trait PHPUnitShortNameTrait
{
    public function dirExists(string $message = ''): self
    {
        return $this->directoryExists($message);
    }

    public function dirNotExist(string $message = ''): self
    {
        return $this->directoryDoesNotExist($message);
    }

    public function dirIsReadable(string $message = ''): self
    {
        return $this->directoryIsReadable($message);
    }

    public function dirIsNotReadable(string $message = ''): self
    {
        return $this->directoryIsNotReadable($message);
    }

    public function dirIsWritable(string $message = ''): self
    {
        return $this->directoryIsWritable($message);
    }

    public function dirIsNotWritable(string $message = ''): self
    {
        return $this->directoryIsNotWritable($message);
    }

    /**
     * @param mixed $expected
     */
    public function greater($expected, string $message = ''): self
    {
        return $this->greaterThan($expected, $message);
    }

    /**
     * @param mixed $expected
     */
    public function isAbove($expected, string $message = ''): self
    {
        return $this->greaterThan($expected, $message);
    }

    /**
     * @param mixed $expected
     */
    public function less($expected, string $message = ''): self
    {
        return $this->lessThan($expected, $message);
    }

    /**
     * @param mixed $expected
     */
    public function isBelow($expected, string $message = ''): self
    {
        return $this->lessThan($expected, $message);
    }

    /**
     * @param mixed $expected
     */
    public function greaterOrEqual($expected, string $message = ''): self
    {
        return $this->greaterThanOrEqual($expected, $message);
    }

    /**
     * @param mixed $expected
     */
    public function isAtLeast($expected, string $message = ''): self
    {
        return $this->greaterThanOrEqual($expected, $message);
    }

    /**
     * @param mixed $expected
     */
    public function lessOrEqual($expected, string $message = ''): self
    {
        return $this->lessThanOrEqual($expected, $message);
    }

    /**
     * @param mixed $expected
     */
    public function isAtMost($expected, string $message = ''): self
    {
        return $this->lessThanOrEqual($expected, $message);
    }

    /**
     * @param int|string $key
     */
    public function hasKey($key, string $message = ''): self
    {
        return $this->arrayHasKey($key, $message);
    }

    /**
     * @param int|string $key
     */
    public function notHasKey($key, string $message = ''): self
    {
        return $this->arrayNotHasKey($key, $message);
    }

    public function match(string $pattern, string $message = ''): self
    {
        return $this->matchesRegularExpression($pattern, $message);
    }

    public function notMatch(string $pattern, string $message = ''): self
    {
        return $this->doesNotMatchRegularExpression($pattern, $message);
    }

    public function startWith(string $prefix, string $message = ''): self
    {
        return $this->stringStartsWith($prefix, $message);
    }

    public function startNotWith(string $prefix, string $message = ''): self
    {
        return $this->stringStartsNotWith($prefix, $message);
    }

    public function endWith(string $suffix, string $message = ''): self
    {
        return $this->stringEndsWith($suffix, $message);
    }

    public function endNotWith(string $suffix, string $message = ''): self
    {
        return $this->stringEndsNotWith($suffix, $message);
    }
}
