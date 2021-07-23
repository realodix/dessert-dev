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

    /** @test */
    public function countActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass('not_countable_or_iterable')->count(1);
    }

    /** @test */
    public function notCountActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass('not_countable_or_iterable')->notCount(1);
    }

    /** @test */
    public function classHasAttributeActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass('not_object')->classHasAttribute('#attribute');
    }

    /** @test */
    public function classNotHasAttributeActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass('not_object')->classNotHasAttribute('!attribute');
    }

    /** @test */
    public function classHasStaticAttributeActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass('')->classHasStaticAttribute('');
    }

    /** @test */
    public function classNotHasStaticAttributeActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass('')->classNotHasStaticAttribute('');
    }

    /** @test */
    public function directoryExistsActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->directoryExists();
    }

    /** @test */
    public function directoryIsReadableActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->directoryIsReadable();
    }

    /** @test */
    public function directoryIsWritableActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->directoryIsWritable();
    }

    /** @test */
    public function fileEqualsActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->fileEquals('');
    }

    /** @test */
    public function fileNotEqualsActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->fileNotEquals('');
    }

    /** @test */
    public function fileExistsActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->fileExists();
    }

    /** @test */
    public function fileIsReadableActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->fileIsReadable();
    }

    /** @test */
    public function fileIsWritableActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->fileIsWritable();
    }



    /** @test */
    public function jsonFileEqualsJsonFileActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->jsonFileEqualsJsonFile('');
    }
    /** @test */
    public function jsonFileNotEqualsJsonFileActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->jsonFileNotEqualsJsonFile('');
    }
    /** @test */
    public function jsonStringEqualsJsonFileActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->jsonStringEqualsJsonFile('');
    }
    /** @test */
    public function jsonStringNotEqualsJsonFileActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->jsonStringNotEqualsJsonFile('');
    }



    /** @test */
    public function jsonStringEqualsJsonStringActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->jsonStringEqualsJsonString('');
    }
    /** @test */
    public function jsonStringNotEqualsJsonStringActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->jsonStringNotEqualsJsonString('');
    }
    /** @test */
    public function objectHasAttributeActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->objectHasAttribute('');
    }

    /** @test */
    public function objectNotHasAttributeActualValue(): void
    {
        $this->expectException(InvalidActualValueException::class);
        ass(false)->objectNotHasAttribute('');
    }
}
