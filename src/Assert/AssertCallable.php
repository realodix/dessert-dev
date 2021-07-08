<?php

namespace Realodix\NextProject\Assert;

use Exception;
use Realodix\NextProject\Assert;
use Realodix\NextProject\Traits\AssertThrowsTrait;
use Throwable;

class AssertCallable extends Assert
{
    use AssertThrowsTrait;

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
