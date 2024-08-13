<?php

namespace Realodix\Dessert\Test\Error;

use PHPUnit\Framework\TestCase;
use Realodix\Dessert\Exceptions\InvalidActualValue;

final class PHPUnitCustomTraitTest extends TestCase
{
    private function error()
    {
        return InvalidActualValue::class;
    }

    public function testContainsActualValue(): void
    {
        $this->expectException($this->error());

        verify(true)->contains(1);
    }

    public function testNotContainsActualValue(): void
    {
        $this->expectException($this->error());

        verify(true)->notContains(1);
    }
}
