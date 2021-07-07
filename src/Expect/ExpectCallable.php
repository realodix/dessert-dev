<?php

namespace Realodix\NextProject\Expect;

use Codeception\Verify\Asserts\AssertThrows;
use Exception;
use Realodix\NextProject\Expect;
use Throwable;

class ExpectCallable extends Expect
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
