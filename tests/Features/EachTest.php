<?php

namespace Realodix\NextProject\Test\Features;

use PHPUnit\Framework\TestCase;

final class EachTest extends TestCase
{
    /**
     * An exception is thrown if the the type is not iterable
     */
    public function testAnExceptionIsThrown(): void
    {
        $this->expectException(
            \BadMethodCallException::class,
            'Expectation value is not iterable.'
        );

        ass('Foobar')->each()->same('Foobar');
    }
}
