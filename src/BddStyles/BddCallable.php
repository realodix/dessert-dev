<?php

namespace Realodix\NextProject\BddStyles;

use Exception;
use Realodix\NextProject\Expect;
use Realodix\NextProject\Traits\AssertThrowsTrait;
use Throwable;

class BddCallable extends Expect
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
    public function notToThrow($throws = null, $message = false): self
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
    public function toThrow($throws = null, $message = false): self
    {
        return $this->assertThrows($throws, $message);
    }
}
