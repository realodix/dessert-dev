<?php

namespace Realodix\NextProject\Traits;

trait PestExpectationsTrait
{
    /**
     * @param mixed  $expected
     * @param string $message
     */
    public function toBe($expected, string $message = ''): self
    {
        return $this->same($expected, $message);
    }

    /**
     * @param string $message
     */
    public function toBeEmpty(string $message = ''): self
    {
        return $this->empty($message);
    }

    /**
     * @param string $message
     */
    public function toBeTrue(string $message = ''): self
    {
        return $this->true($message);
    }

    /**
     * @param string $message
     */
    public function toBeFalse(string $message = ''): self
    {
        return $this->false($message);
    }

    /**
     * @param mixed  $expected
     * @param string $message
     */
    public function toBeGreaterThan($expected, string $message = ''): self
    {
        return $this->greaterThan($expected, $message);
    }

    /**
     * @param mixed  $expected
     * @param string $message
     */
    public function toBeGreaterThanOrEqual($expected, string $message = ''): self
    {
        return $this->greaterThanOrEqual($expected, $message);
    }

    /**
     * @param mixed  $expected
     * @param string $message
     */
    public function toBeLessThan($expected, string $message = ''): self
    {
        return $this->lessThan($expected, $message);
    }

    /**
     * @param mixed  $expected
     * @param string $message
     */
    public function toBeLessThanOrEqual($expected, string $message = ''): self
    {
        return $this->lessThanOrEqual($expected, $message);
    }

    /**
     * @param mixed  $expected
     * @param string $message
     */
    public function toHaveCount($expected, string $message = ''): self
    {
        return $this->count($expected, $message);
    }

    /**
     * @param mixed  $expected
     * @param string $message
     */
    public function toEqual($expected, string $message = ''): self
    {
        return $this->equals($expected, $message);
    }

    /**
     * @param mixed  $expected
     * @param string $message
     */
    public function toEqualCanonicalizing($expected, string $message = ''): self
    {
        return $this->equalsCanonicalizing($expected, $message);
    }

    /**
     * @param mixed  $expected
     * @param string $message
     */
    public function toEqualWithDelta($expected, string $message = ''): self
    {
        return $this->equalsWithDelta($expected, $message);
    }

    /**
     * @param mixed  $expected
     * @param string $message
     */
    public function toBeIn($expected, string $message = ''): self
    {
        return $this->contains($expected, $message);
    }
}
