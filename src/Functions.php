<?php

use Realodix\Dessert\Assertion;

if (! \function_exists('ass')) {
    function ass(mixed $actual): Assertion
    {
        return new Assertion($actual);
    }
}

if (! \function_exists('expect')) {
    /**
     * @param mixed $actual
     */
    function expect($actual): Assertion
    {
        return new Assertion($actual);
    }
}

if (! \function_exists('verify')) {
    function verify(mixed $actual): Assertion
    {
        return new Assertion($actual);
    }
}
