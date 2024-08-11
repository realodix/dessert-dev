<?php

namespace Realodix\Dessert\Test\Error;

use PHPUnit\Framework\TestCase;
use Realodix\Dessert\Exceptions\InvalidActualValue;

final class CustomAssertionsFuctionParamTest extends TestCase
{
    private function error()
    {
        return InvalidActualValue::class;
    }

    /** @test */
    public function stringEqualsActualValue(): void
    {
        $this->expectException($this->error());

        verify(true)->stringEquals(true);
    }

    /** @test */
    public function stringNotEqualsActualValue(): void
    {
        $this->expectException($this->error());

        verify(true)->stringNotEquals(true);
    }

    /** @test */
    public function fileEqualsStringActualValue(): void
    {
        $this->expectException($this->error());

        verify(true)->fileEqualsString('string');
    }

    /** @test */
    public function fileNotEqualsStringActualValue(): void
    {
        $this->expectException($this->error());

        verify(true)->fileNotEqualsString('string');
    }

    /** @test */
    public function fileEqualsStringIgnoringCaseActualValue(): void
    {
        $this->expectException($this->error());

        verify(true)->fileEqualsStringIgnoringCase('string');
    }

    /** @test */
    public function fileNotEqualsStringIgnoringCaseActualValue(): void
    {
        $this->expectException($this->error());

        verify(true)->fileNotEqualsStringIgnoringCase('string');
    }
}
