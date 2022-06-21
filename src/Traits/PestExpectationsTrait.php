<?php

namespace Realodix\NextProject\Traits;

trait PestExpectationsTrait
{
    /**
     * @param string $message
     */
    public function toBe(string $message = ''): self
    {
        return $this->same($message);
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
}
