<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;
use Realodix\NextProject\Exception\InvalidActualValueException;
use Realodix\NextProject\Exception\InvalidArgumentException;

final class FuctionParamTest extends TestCase
{
    /** @test */
    public function arrayHasKeyActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass('$errors')->hasKey(true);
    }

    /** @test */
    public function arrayHasKeyExpectedValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        ass([])->hasKey(true);
    }

    /** @test */
    public function arrayHasNotKeyActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass('$errors')->notHasKey(true);
    }

    /** @test */
    public function arrayHasNotKeyExpectedValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        ass([])->notHasKey(true);
    }

    /** @test */
    public function containsOnlyActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass('not_iterable')->containsOnly('');
    }

    /** @test */
    public function notContainsOnlyActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass('not_iterable')->notContainsOnly('');
    }

    /** @test */
    public function containsOnlyInstancesOfActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass('not_iterable')->containsOnlyInstancesOf('');
    }
}
