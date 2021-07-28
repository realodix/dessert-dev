<?php

namespace Realodix\NextProject\Support;

trait ExpectException
{
    public function expectExceptionMessageMatches($regularExpression)
    {
        $this->expectExceptionMessageRegExp($regularExpression);
    }

    public function expectDeprecation()
    {
        $this->expectException('\PHPUnit\Framework\Error\Deprecated');
    }

    public function expectDeprecationMessage($message)
    {
        $this->expectExceptionMessage($message);
    }

    public function expectDeprecationMessageMatches($regularExpression)
    {
        $this->expectExceptionMessageRegExp($regularExpression);
    }

    public function expectNotice()
    {
        $this->expectException('\PHPUnit\Framework\Error\Notice');
    }

    public function expectNoticeMessage($message)
    {
        $this->expectExceptionMessage($message);
    }

    public function expectNoticeMessageMatches($regularExpression)
    {
        $this->expectExceptionMessageRegExp($regularExpression);
    }

    public function expectWarning()
    {
        $this->expectException('\PHPUnit\Framework\Error\Warning');
    }

    public function expectWarningMessage($message)
    {
        $this->expectExceptionMessage($message);
    }

    public function expectWarningMessageMatches($regularExpression)
    {
        $this->expectExceptionMessageRegExp($regularExpression);
    }

    public function expectError()
    {
        $this->expectException('\PHPUnit\Framework\Error\Error');
    }

    public function expectErrorMessage($message)
    {
        $this->expectExceptionMessage($message);
    }

    public function expectErrorMessageMatches($regularExpression)
    {
        $this->expectExceptionMessageRegExp($regularExpression);
    }
}
