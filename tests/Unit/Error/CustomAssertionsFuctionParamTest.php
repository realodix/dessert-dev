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

    public function testStringEqualsActualValue(): void
    {
        $this->expectException($this->error());

        verify(true)->stringEquals(true);
    }

    public function testStringNotEqualsActualValue(): void
    {
        $this->expectException($this->error());

        verify(true)->stringNotEquals(true);
    }

    public function testFileEqualsStringActualValue(): void
    {
        $this->expectException($this->error());

        verify(true)->fileEqualsString('string');
    }

    public function testFileNotEqualsStringActualValue(): void
    {
        $this->expectException($this->error());

        verify(true)->fileNotEqualsString('string');
    }

    public function testFileEqualsStringIgnoringCaseActualValue(): void
    {
        $this->expectException($this->error());

        verify(true)->fileEqualsStringIgnoringCase('string');
    }

    public function testFileNotEqualsStringIgnoringCaseActualValue(): void
    {
        $this->expectException($this->error());

        verify(true)->fileNotEqualsStringIgnoringCase('string');
    }
}
