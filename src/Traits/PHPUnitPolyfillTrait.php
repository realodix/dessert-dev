<?php

namespace Realodix\Dessert\Traits;

use PHPUnit\Framework\Assert;
use Realodix\Dessert\Exceptions\InvalidActualValue;

trait PHPUnitPolyfillTrait
{
    public function fileMatchesFormat(string $expected, string $message = ''): self
    {
        if (! is_string($this->actual)) {
            throw new InvalidActualValue('string');
        }

        Assert::assertFileMatchesFormat($expected, $this->actual, $message);

        return $this;
    }

    public function fileMatchesFormatFile(string $expected, string $message = ''): self
    {
        if (! is_string($this->actual)) {
            throw new InvalidActualValue('string');
        }

        Assert::assertFileMatchesFormatFile($expected, $this->actual, $message);

        return $this;
    }

    public function objectNotEquals(object $expected, string $method = 'equals', string $message = ''): self
    {
        if (! is_object($this->actual)) {
            throw new InvalidActualValue('object');
        }

        if (! \method_exists(Assert::class, 'assertObjectNotEquals')) {
            Assert::assertThat(
                $this->actual,
                Assert::logicalNot(Assert::objectEquals($expected, $method)),
                $message,
            );

            return $this;
        }

        Assert::assertObjectNotEquals($expected, $this->actual, $method, $message);

        return $this;
    }
}
