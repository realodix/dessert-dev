<?php

namespace Realodix\NextProject\Test\Error;

use PHPUnit\Framework\TestCase;
use Realodix\NextProject\Expect;

class ErrorTest extends TestCase
{
    public function testExceptionMessageMatches()
    {
        $this->expectExceptionMessage('Exception message');
        Expect::after($this)
            ->exceptionMessageMatches('/^Exception/');

        throw new \Exception('Exception message');
    }

    public function testDeprecationCanBeExpected(): void
    {
        Expect::after($this)
            ->deprecation()
            ->deprecationMessage('foo')
            ->deprecationMessageMatches('/foo/');

        trigger_error('foo', E_USER_DEPRECATED);
    }

    public function testNoticeCanBeExpected(): void
    {
        Expect::after($this)
            ->notice()
            ->noticeMessage('foo')
            ->noticeMessageMatches('/foo/');

        trigger_error('foo', E_USER_NOTICE);
    }

    public function testWarningCanBeExpected(): void
    {
        Expect::after($this)
            ->warning()
            ->warningMessage('foo')
            ->warningMessageMatches('/foo/');

        trigger_error('foo', E_USER_WARNING);
    }

    public function testErrorCanBeExpected(): void
    {
        Expect::after($this)
            ->error()
            ->errorMessage('foo')
            ->errorMessageMatches('/foo/');

        trigger_error('foo', E_USER_ERROR);
    }
}
