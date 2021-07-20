<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;
use Realodix\NextProject\Expect;

class ErrorTest extends TestCase
{
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
