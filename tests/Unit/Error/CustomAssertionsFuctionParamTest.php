<?php

namespace Realodix\Dessert\Test\Error;

use PHPUnit\Framework\TestCase;

final class CustomAssertionsFuctionParamTest extends TestCase
{
    private function error()
    {
        return \InvalidArgumentException::class;
    }

    /** @test */
    public function stringEqualsActualValue(): void
    {
        $this->expectException($this->error());

        ass(true)->stringEquals(true);
    }

    /** @test */
    public function stringNotEqualsActualValue(): void
    {
        $this->expectException($this->error());

        ass(true)->stringNotEquals(true);
    }

    /** @test */
    public function fileEqualsStringActualValue(): void
    {
        $this->expectException($this->error());

        ass(true)->fileEqualsString('string');
    }

    /** @test */
    public function fileNotEqualsStringActualValue(): void
    {
        $this->expectException($this->error());

        ass(true)->fileNotEqualsString('string');
    }

    /** @test */
    public function fileEqualsStringIgnoringCaseActualValue(): void
    {
        $this->expectException($this->error());

        ass(true)->fileEqualsStringIgnoringCase('string');
    }

    /** @test */
    public function fileNotEqualsStringIgnoringCaseActualValue(): void
    {
        $this->expectException($this->error());

        ass(true)->fileNotEqualsStringIgnoringCase('string');
    }
}
