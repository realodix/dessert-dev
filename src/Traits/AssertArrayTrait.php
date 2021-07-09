<?php

namespace Realodix\NextProject\Traits;

use PHPUnit\Framework\Assert as PHPUnit;

trait AssertArrayTrait
{
    public function arrayHasKey($key, string $message = ''): self
    {
        PHPUnit::assertArrayHasKey($key, $this->actual, $message);

        return $this;
    }

    public function arrayNotHasKey($key, string $message = ''): self
    {
        PHPUnit::assertArrayNotHasKey($key, $this->actual, $message);

        return $this;
    }

    public function contains($needle, string $message = ''): self
    {
        PHPUnit::assertContains($needle, $this->actual, $message);

        return $this;
    }

    public function containsEquals($needle, string $message = ''): self
    {
        PHPUnit::assertContainsEquals($needle, $this->actual, $message);

        return $this;
    }

    public function containsOnly($type, $isNativeType = null, string $message = ''): self
    {
        PHPUnit::assertContainsOnly($type, $this->actual, $isNativeType, $message);

        return $this;
    }

    public function containsOnlyInstancesOf($className, string $message = ''): self
    {
        PHPUnit::assertContainsOnlyInstancesOf($className, $this->actual, $message);

        return $this;
    }

    public function count($expectedCount, string $message = ''): self
    {
        PHPUnit::assertCount($expectedCount, $this->actual, $message);

        return $this;
    }

    public function notContains($needle, string $message = ''): self
    {
        PHPUnit::assertNotContains($needle, $this->actual, $message);

        return $this;
    }

    public function notContainsEquals($needle, string $message = ''): self
    {
        PHPUnit::assertNotContainsEquals($needle, $this->actual, $message);

        return $this;
    }

    public function notContainsOnly($type, $isNativeType = null, string $message = ''): self
    {
        PHPUnit::assertNotContainsOnly($type, $this->actual, $isNativeType, $message);

        return $this;
    }

    public function notCount($expectedCount, string $message = ''): self
    {
        PHPUnit::assertNotCount($expectedCount, $this->actual, $message);

        return $this;
    }

    public function notSameSize($expected, string $message = ''): self
    {
        PHPUnit::assertNotSameSize($expected, $this->actual, $message);

        return $this;
    }

    public function sameSize($expected, string $message = ''): self
    {
        PHPUnit::assertSameSize($expected, $this->actual, $message);

        return $this;
    }
}
