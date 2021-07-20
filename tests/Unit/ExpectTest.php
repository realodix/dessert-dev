<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;
use Realodix\NextProject\Expect;

class ExpectTest extends TestCase
{
    public function testExpectsAnExceptionWillBeThrown()
    {
        Expect::after($this)->exception();

        throw new \Exception();
    }

    public function testExpectsASpecificExceptionWillBeThrown()
    {
        Expect::after($this)->exception(\InvalidArgumentException::class);

        throw new \InvalidArgumentException();
    }

    public function testExpectsAnExceptionWillBeThrownWithAMessage()
    {
        Expect::after($this)->exception()->describedBy('Exception message');

        throw new \Exception('Exception message');
    }

    public function testExpectsAnExceptionWillBeThrownWithAMessageMatchingARegex()
    {
        Expect::after($this)->exception()->describedByAMessageMatching('/^Exception/');

        throw new \Exception('Exception message');
    }

    public function testExpectsAnExceptionWillBeThrownWithAMessageContainingContent()
    {
        Expect::after($this)->exception()->describedByAMessageContaining('message');

        throw new \Exception('An exception message with a part to match');
    }

    public function testExpectsAnExceptionWithSpecificCodeWillBeThrown()
    {
        Expect::after($this)->exception()->havingCode(42);

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
