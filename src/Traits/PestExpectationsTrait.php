<?php

namespace Realodix\NextProject\Traits;

trait PestExpectationsTrait
{
    /**
     * @param string $message
     */
    public function toBeTrue(string $message = ''): self
    {
        return $this->true($this->actual, $message);
    }

    /**
     * @param string $message
     */
    public function toBeFalse(string $message = ''): self
    {
        return $this->false($message);
    }
}
