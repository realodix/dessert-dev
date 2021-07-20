<?php

namespace Realodix\NextProject;

use PHPUnit\Framework\TestCase;

final class Expect
{
    /**
     * @var TestCase
     */
    private $expectedException;

    /**
     * @param TestCase $expectedException
     */
    private function __construct(TestCase $expectedException)
    {
        $this->expectedException = $expectedException;
    }

    public static function after(TestCase $expectedException)
    {
        return new self($expectedException);
    }

    public function exception(string $class = \Exception::class): self
    {
        $this->expectedException->expectException($class);

        return $this;
    }

    public function eCode(int $code): self
    {
        $this->expectedException->expectExceptionCode($code);

        return $this;
    }

    public function eMessage(string $message): self
    {
        $this->expectedException->expectExceptionMessage($message);

        return $this;
    }

    public function emMatches(string $regex): self
    {
        $this->expectedException->expectExceptionMessageMatches($regex);

        return $this;
    }

    public function deprecation(): self
    {
        $this->expectedException->expectDeprecation();

        return $this;
    }

    public function dMessage(string $message): self
    {
        $this->expectedException->expectDeprecationMessage($message);

        return $this;
    }

    public function dmMatches(string $regex): self
    {
        $this->expectedException->expectDeprecationMessageMatches($regex);

        return $this;
    }

    public function notice(): self
    {
        $this->expectedException->expectNotice();

        return $this;
    }

    public function nMessage(string $message): self
    {
        $this->expectedException->expectNoticeMessage($message);

        return $this;
    }

    public function nmMatches(string $regex): self
    {
        $this->expectedException->expectNoticeMessageMatches($regex);

        return $this;
    }

    public function warning(): self
    {
        $this->expectedException->expectWarning();

        return $this;
    }

    public function wMessage(string $message): self
    {
        $this->expectedException->expectWarningMessage($message);

        return $this;
    }

    public function wmMatches(string $regex): self
    {
        $this->expectedException->expectWarningMessageMatches($regex);

        return $this;
    }

    public function error(): self
    {
        $this->expectedException->expectError();

        return $this;
    }

    public function erMessage(string $message): self
    {
        $this->expectedException->expectErrorMessage($message);

        return $this;
    }

    public function ermMatches(string $regex): self
    {
        $this->expectedException->expectErrorMessageMatches($regex);

        return $this;
    }
}
