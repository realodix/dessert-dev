<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;
use Realodix\NextProject\Expect;

class ErrorTest extends TestCase
{
    /**
     * Expects an exception will be thrown
     */
    public function testException()
    {
        Expect::after($this)->exception();

        throw new \Exception();
    }

    public function testExpectsASpecificExceptionWillBeThrown()
    {
        Expect::after($this)
            ->exception(\InvalidArgumentException::class);

        throw new \InvalidArgumentException();
    }

    /**
     * Expects an exception will be thrown with a message
     */
    public function testExceptionMessage()
    {
        Expect::after($this)
            ->exception()
            ->eMessage('Exception message');

        throw new \Exception('Exception message');
    }

    /**
     * Expects an exception will be thrown with a message matching a regex
     */
    public function testDeprecationMessageMatches()
    {
        Expect::after($this)
            ->exception()
            ->describedByAMessageMatching('/^Exception/');

        throw new \Exception('Exception message');
    }

    public function testExpectsAnExceptionWillBeThrownWithAMessageContainingContent()
    {
        Expect::after($this)
            ->exception()
            ->describedByAMessageContaining('message');

        throw new \Exception('An exception message with a part to match');
    }

    /**
     * Expects an exception with specific code will be thrown
     */
    public function testExceptionCode()
    {
        Expect::after($this)
            ->exception()
            ->eCode(42);

        throw new \Exception('', 42);
    }

    public function testExpectsANoticeWillBeTriggered()
    {
        Expect::after($this)->notice();

        trigger_error('', E_USER_NOTICE);
    }

    public function testExpectsADeprecationWillBeTriggered()
    {
        Expect::after($this)->deprecation();

        trigger_error('', E_USER_DEPRECATED);
    }

    public function testExpectsAWarningWillBeTriggered()
    {
        Expect::after($this)->warning();

        trigger_error('', E_USER_WARNING);
    }

    public function testExpectsAnErrorWillBeTriggered()
    {
        Expect::after($this)->error();

        trigger_error('', E_USER_ERROR);
    }
}
