<?php

namespace Realodix\Dessert\Traits;

trait PestExpectationsTrait
{
    /**
     * @param mixed $expected
     */
    public function toBe($expected, string $message = ''): self
    {
        return $this->same($expected, $message);
    }

    public function toBeEmpty(string $message = ''): self
    {
        return $this->empty($message);
    }

    public function toBeTrue(string $message = ''): self
    {
        return $this->true($message);
    }

    public function toBeFalse(string $message = ''): self
    {
        return $this->false($message);
    }

    /**
     * @param mixed $expected
     */
    public function toBeGreaterThan($expected, string $message = ''): self
    {
        return $this->greaterThan($expected, $message);
    }

    /**
     * @param mixed $expected
     */
    public function toBeGreaterThanOrEqual($expected, string $message = ''): self
    {
        return $this->greaterThanOrEqual($expected, $message);
    }

    /**
     * @param mixed $expected
     */
    public function toBeLessThan($expected, string $message = ''): self
    {
        return $this->lessThan($expected, $message);
    }

    /**
     * @param mixed $expected
     */
    public function toBeLessThanOrEqual($expected, string $message = ''): self
    {
        return $this->lessThanOrEqual($expected, $message);
    }

    /**
     * @param mixed $expected
     */
    public function toHaveCount($expected, string $message = ''): self
    {
        return $this->count($expected, $message);
    }

    /**
     * @param mixed $expected
     */
    public function toEqual($expected, string $message = ''): self
    {
        return $this->equals($expected, $message);
    }

    /**
     * @param mixed $expected
     */
    public function toEqualCanonicalizing($expected, string $message = ''): self
    {
        return $this->equalsCanonicalizing($expected, $message);
    }

    /**
     * @param mixed $expected
     */
    public function toEqualWithDelta($expected, string $message = ''): self
    {
        return $this->equalsWithDelta($expected, $message);
    }

    /**
     * @param mixed $expected
     */
    public function toBeIn($expected, string $message = ''): self
    {
        return $this->contains($expected, $message);
    }

    /**
     * @param string $message
     */
    public function toBeInfinite($message = ''): self
    {
        return $this->infinite($message);
    }

    /**
     * @param mixed $expected
     */
    public function toBeInstanceOf($expected, string $message = ''): self
    {
        return $this->instanceOf($expected, $message);
    }

    /**
     * @param string $message
     */
    public function toBeArray($message = ''): self
    {
        return $this->isArray($message);
    }

    /**
     * @param string $message
     */
    public function toBeBool($message = ''): self
    {
        return $this->isBool($message);
    }

    /**
     * @param string $message
     */
    public function toBeCallable($message = ''): self
    {
        return $this->isCallable($message);
    }

    /**
     * @param string $message
     */
    public function toBeFloat($message = ''): self
    {
        return $this->isFloat($message);
    }

    /**
     * @param string $message
     */
    public function toBeInt($message = ''): self
    {
        return $this->isInt($message);
    }

    /**
     * @param string $message
     */
    public function toBeIterable($message = ''): self
    {
        return $this->isIterable($message);
    }

    /**
     * @param string $message
     */
    public function toBeNumeric($message = ''): self
    {
        return $this->isNumeric($message);
    }

    /**
     * @param string $message
     */
    public function toBeObject($message = ''): self
    {
        return $this->isObject($message);
    }

    /**
     * @param string $message
     */
    public function toBeResource($message = ''): self
    {
        return $this->isResource($message);
    }
}
