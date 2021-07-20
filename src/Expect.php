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

    public function eMessage(string $message): self
    {
        $this->expectedException->expectExceptionMessage($message);

        return $this;
    }

    public function eCode(int $code): self
    {
        $this->expectedException->expectExceptionCode($code);

        return $this;
    }

    public function deprecation(): self
    {
        $this->expectedException->expectDeprecation();

        return $this;
    }

    public function describedByAMessageMatching(string $pattern): self
    {
        $this->expectedException->expectDeprecationMessageMatches($pattern);

        return $this;
    }

    public function describedByAMessageContaining(string $part): self
    {
        $this->expectedException->expectDeprecationMessageMatches('/'.preg_quote($part).'/');

        return $this;
    }

    public function notice(): self
    {
        $this->expectedException->expectNotice();

        return $this;
    }

    public function warning(): self
    {
        $this->expectedException->expectWarning();

        return $this;
    }

    public function error(): self
    {
        $this->expectedException->expectError();

        return $this;
    }
}
