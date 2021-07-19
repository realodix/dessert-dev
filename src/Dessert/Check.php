<?php

namespace Realodix\NextProject;

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
     *
     * @param mixed $value
     *
     * @return Assertion
     */
    public static function that($value): Assertion
    {
        return new Assertion($value);
    }
}
