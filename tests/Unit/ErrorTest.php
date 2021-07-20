<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;
use Realodix\NextProject\Expect;

class ErrorTest extends TestCase
{
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

    public function testExceptionCode()
    {
        Expect::after($this)
            ->eCode(42);

        throw new \Exception('', 42);
    }

    public function testExceptionMessage()
    {
        Expect::after($this)
            ->eMessage('Exception message')
            ->emMatches('/^Exception/');

        throw new \Exception('Exception message');
    }

    public function testDeprecationCanBeExpected(): void
    {
        Expect::after($this)
            ->deprecation()
            ->dMessage('foo')
            ->dmMatches('/foo/');

        trigger_error('foo', E_USER_DEPRECATED);
    }

    public function testNoticeCanBeExpected(): void
    {
        Expect::after($this)
            ->notice()
            ->nMessage('foo')
            ->nmMatches('/foo/');

        trigger_error('foo', E_USER_NOTICE);
    }

    public function testWarningCanBeExpected(): void
    {
        Expect::after($this)
            ->warning()
            ->wMessage('foo')
            ->wmMatches('/foo/');

        trigger_error('foo', E_USER_WARNING);
    }

    public function testErrorCanBeExpected(): void
    {
        Expect::after($this)
            ->error()
            ->erMessage('foo')
            ->ermMatches('/foo/');

        trigger_error('foo', E_USER_ERROR);
    }
}
