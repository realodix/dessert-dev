<?php

namespace Realodix\Dessert;

class Check
{
    /**
     * Start validation on a value, returns Assertion class.
     *
     * EXAMPLE
     * Check::that($value)->notEmpty()->integer();
     * Check::that($value)->nullOr()->string()->startWith("Foo");
     *
     * The assertion chain can be stateful, that means be careful when you reuse it. You
     * should never pass around the chain.
     */
    public static function that(mixed $value): Assertion
    {
        return new Assertion($value);
    }
}
