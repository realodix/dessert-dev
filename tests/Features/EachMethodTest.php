<?php

namespace Realodix\NextProject\Test\Features;

use PHPUnit\Framework\TestCase;

final class EachMethodTest extends TestCase
{
    /**
     * Expects on each item
     */
    public function testEach(): void
    {
        ass([1, 1, 1])
            ->each()
            ->equals(1);

        ass(static::getCount())->same(3); // + 1 assertion

        ass([1, 1, 1])
            ->each
            ->equals(1);

        ass(static::getCount())->same(7);
    }

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
