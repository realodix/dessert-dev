<?php

namespace Realodix\NextProject;

class Assert
{
    /**
     * Start validation on a value, returns Assertion class.
     *
     * EXAMPLE
     * Assert::that($value)->notEmpty()->integer();
     * Assert::that($value)->nullOr()->string()->startWith("Foo");
     *
     * The assertion chain can be stateful, that means be careful when you reuse it. You
     * should never pass around the chain.
     *
     * @param mixed $value
     */
    public static function that($value): Assertion
    {
        return new Assertion($value);
    }
}
