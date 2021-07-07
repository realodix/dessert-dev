<?php

namespace Realodix\NextProject\Verifiers;

use Exception;
use Realodix\NextProject\Asserts\AssertThrows;
use Realodix\NextProject\Verify;
use Throwable;

class VerifyCallable extends Verify
{
    use AssertThrows;

    public function __construct(callable $callable)
    {
        parent::__construct($callable);
    }

    /**
     * @param Exception|string|null $throws
     * @param string|false          $message
     *
     * @return $this
     */
    public function doesNotThrow($throws = null, $message = false): self
    {
        return $this->assertDoesNotThrow($throws, $message);
    }

    /**
     * @param Exception|string|null $throws
     * @param string|false          $message
     *
     * @throws Throwable
     *
     * @return self
     */
    public function throws($throws = null, $message = false): self
    {
        return $this->assertThrows($throws, $message);
    }
}
