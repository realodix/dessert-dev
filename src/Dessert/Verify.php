<?php

namespace Realodix\NextProject;

class Verify
{
    /**
     * Start validation on a value, returns Assertion class.
     *
     * The invocation of this method starts an assertion chain that is happening on the
     * passed value.
     *
     * EXAMPLE
     * Verify::that($value)->notEmpty()->integer();
     * Verify::that($value)->nullOr()->string()->startWith("Foo");
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