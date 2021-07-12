<?php

namespace Realodix\NextProject\Traits;

use PHPUnit\Framework\Assert as PHPUnit;
use PHPUnit\Runner\Version as PUVersion;

trait ArrayTrait
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
        // https://github.com/sebastianbergmann/phpunit/issues/3511
        if (version_compare(PUVersion::series(), '8.1', '<')) {
            // @codeCoverageIgnoreStart
            $constraint = new \PHPUnit\Framework\Constraint\TraversableContains($needle);

            PHPUnit::assertThat($this->actual, $constraint, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

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
        // https://github.com/sebastianbergmann/phpunit/issues/3511
        if (version_compare(PUVersion::series(), '8.1', '<')) {
            // @codeCoverageIgnoreStart
            $constraint = new \PHPUnit\Framework\Constraint\LogicalNot(
                new \PHPUnit\Framework\Constraint\TraversableContains(
                    $needle,
                    false,
                    false
                )
            );

            PHPUnit::assertThat($this->actual, $constraint, $message);

            return $this;
            // @codeCoverageIgnoreEnd
        }

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
