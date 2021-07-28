<?php

namespace Realodix\NextProject\Test\Error;

use PHPUnit\Framework\TestCase;
use Realodix\NextProject\Support\ExpectException;

class ErrorTest extends TestCase
{
    use ExpectException;

    public function testExceptionMessageMatches()
    {
        $this->expectExceptionMessageMatches('/^Exception/');

        throw new \Exception('Exception message');
    }

    public function testDeprecationCanBeExpected(): void
    {
        $this->expectDeprecation();
        $this->expectDeprecationMessage('foo');
        $this->expectDeprecationMessageMatches('/foo/');

        trigger_error('foo', E_USER_DEPRECATED);
    }

    public function testNoticeCanBeExpected(): void
    {
        $this->expectNotice();
        $this->expectNoticeMessage('foo');
        $this->expectNoticeMessageMatches('/foo/');

        trigger_error('foo', E_USER_NOTICE);
    }

    public function testWarningCanBeExpected(): void
    {
        $this->expectWarning();
        $this->expectWarningMessage('foo');
        $this->expectWarningMessageMatches('/foo/');

        trigger_error('foo', E_USER_WARNING);
    }

    public function testErrorCanBeExpected(): void
    {
        $this->expectError();
        $this->expectErrorMessage('foo');
        $this->expectErrorMessageMatches('/foo/');

        trigger_error('foo', E_USER_ERROR);
    }
}
