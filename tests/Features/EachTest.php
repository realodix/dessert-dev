<?php

namespace Realodix\NextProject\Test\Features;

use PHPUnit\Framework\TestCase;
use Realodix\NextProject\Assertion;

final class EachTest extends TestCase
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

    /**
     * Chains expectations on each item
     */
    public function testChainsExpectations(): void
    {
        ass([1, 1, 1])
            ->each()
            ->isInt()
            ->equals(1);

        ass(static::getCount())->same(6); // + 1 assertion

        ass([2, 2, 2])
            ->each
            ->isInt
            ->equals(2);

        ass(static::getCount())->same(13);
    }

    /*
     * Opposite expectations on each item
     */
    // public function testOpposite(): void
    // {
    //     ass([1, 2, 3])
    //         ->each()
    //         ->not()
    //         ->equals(4);

    //     ass(static::getCount())->same(3);

    //     ass([1, 2, 3])
    //         ->each()
    //         ->not->isString;

    //     ass(static::getCount())->same(7);
    // }

    /*
     * Chained opposite and non-opposite expectations
     */
    // public function testChainedOppositeAndNonOpposite(): void
    // {
    //     ass([1, 2, 3])
    //         ->each()
    //         ->not()
    //         ->equals(4)
    //         ->isInt();

    //     ass(static::getCount())->same(6);
    // }

    /*
     * Can add expectations via "and"
     */
    // public function testCanAddExpectationsViaAnd(): void
    // {
    //     ass([1, 2, 3])
    //         ->each()
    //         ->isInt // + 3
    //         ->and([4, 5, 6])
    //         ->each
    //         ->lessThan(7) // + 3
    //         ->not
    //         ->lessThan(3)
    //         ->greaterThan(3) // + 3
    //         ->and('Hello World')
    //         ->isString // + 1
    //         ->equals('Hello World'); // + 1

    //     ass(static::getCount())->same(14);
    // }

    /*
     * Accepts callables
     */
    // public function testCallables(): void
    // {
    //     ass([1, 2, 3])->each(function ($number) {
    //         ass($number)->instanceOf(Assertion::class);
    //         ass($number->value)->isInt();
    //         $number->isInt->not->isString;
    //     });

    //     ass(static::getCount())->same(12);
    // }
}
