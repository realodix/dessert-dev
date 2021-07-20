<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;
use Realodix\NextProject\Expect;

class ExpectTest extends TestCase
{
    public function testExpectsAnExceptionWillBeThrown()
    {
        Expect::after($this)->anException();

        throw new \Exception();
    }

    public function testExpectsASpecificExceptionWillBeThrown()
    {
        Expect::after($this)->anException(\InvalidArgumentException::class);

        throw new \InvalidArgumentException();
    }

    public function testExpectsAnExceptionWillBeThrownWithAMessage()
    {
        Expect::after($this)->anException()->describedBy('Exception message');

        throw new \Exception('Exception message');
    }

    public function testExpectsAnExceptionWillBeThrownWithAMessageMatchingARegex()
    {
        Expect::after($this)->anException()->describedByAMessageMatching('/^Exception/');

        throw new \Exception('Exception message');
    }

    public function testExpectsAnExceptionWillBeThrownWithAMessageContainingContent()
    {
        Expect::after($this)->anException()->describedByAMessageContaining('message');

        throw new \Exception('An exception message with a part to match');
    }

    public function testExpectsAnExceptionWithSpecificCodeWillBeThrown()
    {
        Expect::after($this)->anException()->havingCode(42);

        throw new \Exception('', 42);
    }

    public function testExpectsANoticeWillBeTriggered()
    {
        Expect::after($this)->aNotice();

        trigger_error('', E_USER_NOTICE);
    }

    public function testExpectsADeprecationWillBeTriggered()
    {
        Expect::after($this)->aDeprecation();

        trigger_error('', E_USER_DEPRECATED);
    }

    public function testExpectsAWarningWillBeTriggered()
    {
        Expect::after($this)->aWarning();

        trigger_error('', E_USER_WARNING);
    }

    public function testExpectsAnErrorWillBeTriggered()
    {
        Expect::after($this)->anError();

        trigger_error('', E_USER_ERROR);
    }
}
