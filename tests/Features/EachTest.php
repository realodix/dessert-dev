<?php

namespace Realodix\NextProject\Test\Features;

use PHPUnit\Framework\TestCase;

final class EachTest extends TestCase
{
    /** @test */
    public function an_exception_is_thrown_if_the_the_type_is_not_iterable(): void
    {
        $this->expectException(\BadMethodCallException::class, 'Expectation value is not iterable.');
        ass('Foobar')->each()->same('Foobar');
    }
}
