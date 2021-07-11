<?php

namespace Realodix\NextProject\Traits;

use PHPUnit\Framework\Assert as PHPUnit;

trait ClassTrait
{
    public function classHasAttribute($attributeName, string $message = ''): self
    {
        PHPUnit::assertClassHasAttribute($attributeName, $this->actual, $message);

        return $this;
    }

    public function classHasStaticAttribute($attributeName, string $message = ''): self
    {
        PHPUnit::assertClassHasStaticAttribute($attributeName, $this->actual, $message);

        return $this;
    }

    public function classNotHasAttribute($attributeName, string $message = ''): self
    {
        PHPUnit::assertClassNotHasAttribute($attributeName, $this->actual, $message);

        return $this;
    }

    public function classNotHasStaticAttribute($attributeName, string $message = ''): self
    {
        PHPUnit::assertClassNotHasStaticAttribute($attributeName, $this->actual, $message);

        return $this;
    }

    public function instanceOf(string $expected, string $message = ''): self
    {
        PHPUnit::assertInstanceOf($expected, $this->actual, $message);

        return $this;
    }

    public function notInstanceOf(string $expected, string $message = ''): self
    {
        PHPUnit::assertNotInstanceOf($expected, $this->actual, $message);

        return $this;
    }

    public function objectHasAttribute($attributeName, string $message = ''): self
    {
        PHPUnit::assertObjectHasAttribute($attributeName, $this->actual, $message);

        return $this;
    }

    public function objectNotHasAttribute($attributeName, string $message = ''): self
    {
        PHPUnit::assertObjectNotHasAttribute($attributeName, $this->actual, $message);

        return $this;
    }
}
